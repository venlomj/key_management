<?php

namespace App\Livewire\Forms;

use App\Models\InstitutionUser;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonForm extends Form
{
    public $id = null;
    #[Validate('required', as: 'De account id')]
    public $account_id = null;
    #[Validate('required', as: 'De achternaam')]
    public $last_name = null;
    #[Validate('required', as: 'De voornaam')]
    public $first_name = null;
    public $employee_code = null;
    #[Validate('required', as: 'De school')]
    public $institutions = [];
    #[Validate('required', as: 'De roepnaam')]
    public $preferred_name = null;
    #[Validate('required', as: 'Het e-mailadres')]
    public $email = null;
    //#[Validate('required', as: 'De Betaalmethode')]
    public $payment_method = null;
    public $deposit_amount = null;

    // Payment-related fields
    public $deposit_paid = false;
    public $deposit_refunded = false;

    public function create()
    {
        $this->validate();
        $person = User::create([
            'account_id' => $this->account_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'preferred_name' => $this->preferred_name,
            'employee_code' => $this->employee_code,
            'email' => $this->email,
            'password' => Hash::make('EersteKeer2024!'),
        ]);

        // Insert into the institution_users pivot table
        if (!empty($this->institutions)) {
            foreach ($this->institutions as $institutionId) {
                InstitutionUser::create([
                    'user_id' => $person->id,
                    'institution_id' => $institutionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        // Create the associated Payment
        Payment::create([
            'user_id' => $person->id,
            'deposit_amount' => $this->deposit_amount,
            'deposit_paid' => $this->deposit_paid,
            'deposit_refunded' => $this->deposit_refunded,
            'payment_method' => $this->payment_method,
        ]);

    }

    public function update(User $person)
    {
        // Sync the selected institutions with the user
        $person->institutions()->sync($this->institutions);

        $this->validate();
        $person->update([
            'account_id' => $this->account_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'employee_code' => $this->employee_code,
            'preferred_name' => $this->preferred_name,
            'email' => $this->email,
        ]);

        //$person->institutions = $this->institutions;

        // Update the Payment (if it exists)
        if ($person->payment) {
            $person->payment->update([
                'deposit_paid' => $this->deposit_paid,
                'deposit_refunded' => $this->deposit_refunded,
                'payment_method' => $this->payment_method,
                'deposit_amount' => $this->deposit_amount,
            ]);
        }

    }

    public function rules()
    {
        return [
            'institutions' => 'required|array|min:1',
        ];
    }

}
