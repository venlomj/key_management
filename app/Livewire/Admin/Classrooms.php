<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ClassroomForm;
use App\Models\Classroom;
use App\Models\Institution;
use App\Models\Key;
use App\Traits\SweetAlertTrait;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Classrooms extends Component
{
    use WithPagination;
    use SweetAlertTrait;

    public $search;
    public $institution = '';
    public $classroom_block = '';

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
        if (in_array($property, ['search', 'perPage', 'institution', 'classroom_block',  'showModal'])) {
            $this->resetPage();
        }
    }

    #[Layout('layouts.keymanagement', ['title' => 'Lokalen', 'pageTitle' => 'Lokalen',
        'pageSubtitle' => 'Lokalen voor de beheerder',
        'description' => 'Hier kan de beheerder de lokalen beheren'])]
    public function render()
    {
        // Get institutions and classroom blocks for dropdowns
        $allInstitutions = Institution::orderBy('name')->get();
        $classroomBlocks = Classroom::select('classroom_block')
            ->orderBy('classroom_block')
            ->distinct()
            ->pluck('classroom_block');

        // Start the query
        $query = Classroom::with('institution') // Eager load institution
        ->orderBy('classroom_name')
            ->orderBy('classroom_code');

        // Apply filters
        $query->when($this->search, function ($query) {
            $query->searchClassroomNameOrCode($this->search);
        });

        $query->when($this->classroom_block, function ($query) {
            $query->where('classroom_block', $this->classroom_block);
        });

        $query->when($this->institution, function ($query) {
            $query->where('institution_id', $this->institution);
        });

        // Paginate the results
        $classrooms = $query->paginate($this->perPage);

        // Get other necessary data
        $keys = Key::orderBy('code')->get();

        return view('livewire.admin.classrooms', compact('classrooms', 'keys', 'classroomBlocks', 'allInstitutions'));
    }

//    public function render()
//    {
//        // Get institutions and classroom blocks for dropdowns
//        $allInstitutions = Institution::orderBy('name')->get();
//
//        $classroomBlocks = Classroom::select('classroom_block')
//            ->orderBy('classroom_block')
//            ->distinct()
//            ->pluck('classroom_block');
//
//        // Start the query
//        $query = Classroom::with('institution') // Eager load institution
//        ->orderBy('classroom_name')
//            ->orderBy('classroom_code')
//            ->searchClassroomNameOrCode($this->search)
//            ->when($this->classroom_block, function ($query) {
//                $query->where('classroom_block', $this->classroom_block);
//            })
//            ->when($this->institution, function ($query) {
//                $query->where('institution_id', $this->institution);
//            });
//
//
//        // Paginate the results
//        $classrooms = $query->paginate($this->perPage);
//
//        // Get other necessary data
//        $keys = Key::orderBy('code')->get();
//
//        return view('livewire.admin.classrooms', compact('classrooms', 'keys', 'classroomBlocks', 'allInstitutions'));
//    }

}
