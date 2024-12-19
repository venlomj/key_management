<?php

namespace App\Livewire\Admin;

use App\Models\KeyCabinetStorage;
use Livewire\Attributes\Layout;
use Livewire\Component;

class KeyStorage extends Component
{

    #[Layout('layouts.keymanagement', [
        'title' => 'Sleutelkast',
        'pageTitle' => 'Sleutelkast',
        'pageSubtitle' => 'Sleutelkast voor de beheerder',
        'description' => 'Hier kan de beheerder de Sleutelkast beheren',
    ])]
    public function render()
    {
        return view('livewire.admin.key-storage');
    }

}
