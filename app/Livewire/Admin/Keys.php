<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\KeyForm;
use App\Models\Key;
use App\Traits\SweetAlertTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Keys extends Component
{
    use WithPagination;
    use SweetAlertTrait;

    // public props
    public $search;
    public $perPage = 8;
    public $loading = 'Een ogenblikje...';

    public $showModal = false;

    public KeyForm $form;

    public function newKey()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createKey()
    {
        $this->form->create();
        $this->showModal = false;
        $this->swalToast("De sleutel, <b><i>{$this->form->code}</i></b>, is toegevoegd", "success", [
            'icon' => 'success',
        ]);
    }

    public function editKey(Key $key)
    {
        $this->resetErrorBag();
        $this->form->fill($key);
        $this->showModal = true;
    }

    public function updateKey(Key $key)
    {
        $this->form->update($key);
        $this->showModal = false;
        $this->swalToast("De sleutel is bijgewerkt", "success", [
            'icon' => 'success',
        ]);
    }

    public function updated($property, $value)
    {
        if (in_array($property, ['perPage', 'search']))
            $this->resetPage();
    }
    #[Layout('layouts.keymanagement', [
        'title' => 'Sleutels',
        'pageTitle' => 'Sleutels',
        'pageSubtitle' => 'Sleutels voor de beheerder',
        'description' => 'Hier kan de beheerder de sleutels beheren',
    ])]
    public function render()
    {
        $keys = Key::orderBy('code')
            ->searchKeyCode($this->search)
            ->paginate($this->perPage);

        return view('livewire.admin.keys', compact('keys'));
    }
}
