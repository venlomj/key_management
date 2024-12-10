<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ClassroomForm;
use App\Models\Classroom;
use App\Models\Key;
use App\Traits\SweetAlertTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Classrooms extends Component
{
    use WithPagination;
    use SweetAlertTrait;

    public $search;
    public string $loading = 'Een ogenblikje...';

    public $perPage = 10;
    public $showModal = false;
    public ClassroomForm $form;

    // Open modal and fill the form with classroom data
    public function newKey(Classroom $classroom)
    {
        $this->resetErrorBag();
        $this->form->fill($classroom);
        $this->showModal = true;
    }

    // Add or update the key for the classroom
    public function addKey(Classroom $classroom)
    {
        $this->form->updateKey($classroom);

        $this->swalToast("De sleutel is toegewezen aan <b><i>{$classroom->classroom_name}</i></b>.",
            'info', ['icon' => 'success']);
        $this->showModal = false;
    }


    // Reset pagination when filters or properties change
    public function updated($property, $value): void
    {
        if (in_array($property, ['search', 'perPage', 'showModal'])) {
            $this->resetPage();
        }
    }

    #[Layout('layouts.keymanagement', ['title' => 'Lokalen', 'pageTitle' => 'Lokalen',
        'pageSubtitle' => 'Lokalen voor de beheerder',
        'description' => 'Hier kan de beheerder de lokalen beheren'])]
    public function render()
    {
        $query = Classroom::orderBy('classroom_name')
            ->orderBy('classroom_code')
            ->searchClassroomNameOrCodeOrBlock($this->search);

        $classrooms = $query->paginate($this->perPage);
        $keys = Key::orderBy('code')->get();

        return view('livewire.admin.classrooms', compact('classrooms', 'keys'));
    }
}
