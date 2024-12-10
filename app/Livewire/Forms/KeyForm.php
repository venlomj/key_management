<?php

namespace App\Livewire\Forms;

use App\Models\Key;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KeyForm extends Form
{
    public $id = null;
    #[validate('required', as: 'De sleutelcode')]
    public $code = null;
    #[validate('required', as: 'Het sleuteltype')]
    public $type = null;

    public function create()
    {
        $this->validate();
        Key::create([
            'code' => $this->code,
            'type' => $this->type,
        ]);
    }

    public function update(Key $key)
    {
        $this->validate();
        $key->update([
            'code' => $this->code,
            'type' => $this->type,
        ]);
    }
}
