<?php

namespace App\Livewire\Admin;

use App\Enums\PaymentMethod;
use App\Livewire\Forms\PersonForm;
use App\Models\Institution;
use App\Models\Key;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserKey;
use App\Traits\SweetAlertTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Persons extends Component
{
    use SweetAlertTrait;
    use WithPagination;

    public $search;

    public $filter;

    public $users;

    public int $perPage = 10;

    public string $loading = 'Een ogenblikje...';

    public $selectedPerson;

    public $availableKeys = [];

    public $userKeys = [];

    public $selectedKeyIds = [];

    public $keyList = [];

    public $selectedKeyRemarks = [];

    // modal visibility
    public bool $showModal = false;

    public bool $showKeyModal = false;

    public bool $showPersonModal = false;

    public PersonForm $form;

    public $confirmingDelete = false;

    public $deletePersonId;

    public $institutions = [];
    public $confirmingRemove = false;
    public $userKeyToDelete = null;

    public $allInstitutions;
    //public $payment;

    public function mount(): void
    {
        $this->keyList = Key::orderBy('code')->get();
        $this->institutions = Institution::all();
        //$this->allInstitutions = User::with('institutions')->get();
    }

    public function newPerson()
    {
        $this->form->reset();
        //$this->institutions = [];
        $this->form->payment_method = null;
        $this->form->deposit_paid = false;
        $this->form->deposit_refunded = false;
        $this->form->deposit_amount = null;
        $this->resetErrorBag();
        $this->showPersonModal = true;
    }

    public function createPerson()
    {
        $this->validate();

        //$this->form->institutions = $this->institutions;
        $this->form->create();

        $this->showPersonModal = false;
        $this->swalToast("De persoon, <b><i>{$this->form->preferred_name}</i></b> is toegevoegd!", 'success', [
            'icon' => 'success',
        ]);
    }

    public function editPerson(User $person)
    {
        $this->resetErrorBag();
        $this->form->fill($person);

        // Populate related data for institutions (ensure this is correctly set)
        $this->form->institutions = $person->institutions->pluck('id')->toArray();

        // Pre-fill payment data if payment exists
        if ($person->payment) {
            // dump($person->payment);
            $this->form->deposit_paid = (bool) $person->payment->deposit_paid;
            $this->form->deposit_refunded = (bool) $person->payment->deposit_refunded;
            $this->form->payment_method = $person->payment->payment_method;
            $this->form->deposit_amount = $person->payment->deposit_amount;
        }

        //dump($this->form);

        $this->showPersonModal = true;
    }


    public function updatePerson(User $person)
    {
        $this->form->institutions = $this->institutions;
        $this->form->update($person);
        $this->showPersonModal = false;

        $this->swalToast("De persoon <b><i>{$this->form->preferred_name}</i></b> is bijgewerkt!", 'success', [
            'icon' => 'success',
        ]);
    }


    // Method to show the delete modal
    public function showDeleteModal($id)
    {
        $this->deletePersonId = $id;
        $this->confirmingDelete = true;
    }

    // Method to delete the person
    public function deletePerson(User $person)
    {
        $this->deletePersonId = $person->id;
        $this->confirmingDelete = true;
    }

    public function deleteConfirmed()
    {
        $person = User::findOrFail($this->deletePersonId);

        $person->delete();

        $this->swalToast("De persoon <b><i>{$person->preferred_name}</i></b> is verwijderd!", 'success', [
            'icon' => 'info',
        ]);

        $this->confirmingDelete = false;
        $this->reset('deletePersonId'); // Clear the ID after deletion
    }

    public function updatedFilter($value)
    {
        $this->keyList = Key::orderBy('code')
            ->searchKeyCode($value)
            ->get();
    }

    public function getUserKeyLoans(User $user, $keyId)
    {
        return UserKey::where('user_id', $user->id)
            ->where('key_id', $keyId)
            ->with('key')  // Eager load the key relationship
            ->get();
    }

    public function showSelectedPerson(User $person): void
    {
        $this->selectedPerson = $person;

        // Load the user's keys
        $this->userKeys = UserKey::where('user_id', $person->id)
            ->with('key')
            ->get();

        $this->showModal = true;
    }

    public function removeKeyFromUser(int $userKeyId): void
    {
        // Find the specific user-key record
        $userKey = UserKey::find($userKeyId);

        if (!$userKey) {
            $this->swalToast(
                'De sleutel kan niet worden gevonden.',
                'error', [
                    'icon' => 'error',
                    'position' => 'top-right',
                ]
            );
            return;
        }

        // Get the associated user (optional if you need to reload modal data)
        $person = User::find($userKey->user_id);

        // Delete the userKey record
        $userKey->delete();

        // Refresh the modal data to reflect changes
        if ($person) {
            $this->userKeys = UserKey::where('user_id', $person->id)
                ->with('key')
                ->get();
        }

        // Provide feedback for successful removal
        $this->swalToast(
            'De sleutel is succesvol verwijderd.',
            'success', [
                'icon' => 'success',
                'position' => 'top-right',
            ]
        );
    }


    public function showKey(User $person): void
    {
        $this->selectedPerson = $person;
        $this->showKeyModal = true;
    }

    public function borrowSelectedKeys(): void
    {
        // Validate if keys are selected
        if (empty($this->selectedKeyIds)) {
            session()->flash('error', 'Geen sleutels geselecteerd.');

            return;
        }

        // Loop through each selected key and process the borrowing
        foreach ($this->selectedKeyIds as $selectedKeyId) {
            $key = Key::find($selectedKeyId);

            // Ensure key exists
            if (! $key) {
                session()->flash('error', 'Sleutel niet gevonden.');

                continue;
            }

            // Loop through each selected key to get remarks and quantities
            foreach ($this->selectedKeyIds as $keyId) {
                // Get the remark for the key
                $remark = $this->selectedKeyRemarks[$keyId] ?? '';  // Default to an empty string if no remark
                $quantity = 1;  // Default quantity, adjust as needed
            }

            // Create a new entry in the pivot table for each key borrowed, with its own remark
            $this->selectedPerson->keys()->attach($selectedKeyId, [
                'quantity' => $quantity,  // Adjust quantity if necessary
                'remark' => $remark,
                'loaned_at' => now(),  // Set the current timestamp
                'returned_at' => null,  // Initially not returned
            ]);
        }

        // Show the success toast after borrowing the keys
        $this->swalToast(
            'De sleutels zijn gereserveerd.',
            'success', [
                'icon' => 'success',
                'position' => 'top-right',
            ]
        );

        // Close the modal after borrowing the keys
        $this->showKeyModal = false;
    }



    public function updated($property, $value): void
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property
        if (in_array($property, ['search', 'perPage', 'showModal'])) {
            $this->resetPage();
        }
    }

    #[Layout('layouts.keymanagement', ['title' => 'Personen', 'pageTitle' => 'Personen',
        'pageSubtitle' => 'Personen voor de beheerder',
        'description' => 'Hier kan de beheerder de gebruikers beheren'])]
    public function render()
    {
        $persons = User::orderBy('last_name')
            ->orderBy('first_name')
            ->with('institutions')
            ->searchFirstNameOrLastName($this->search)
            ->paginate($this->perPage);


        return view('livewire.admin.persons', [
            'persons' => $persons,
            'institutions' => $this->institutions,
            'userKeys' => $this->userKeys,
        ]);
    }
}
