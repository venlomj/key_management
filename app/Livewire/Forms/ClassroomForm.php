<?php

namespace App\Livewire\Forms;

use App\Models\Classroom;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClassroomForm extends Form
{
    public $id = null;
    #[Validate('required|exists:keys,id', as: 'key')]
    public $key_id = null;
    #[Validate('required', as: 'De lokaal naam')]
    public $classroom_name;
    #[Validate('required', as: 'De lokaal code')]
    public $classroom_code;
    #[Validate('required', as: 'De lokaal blok')]
    public $classroom_block;
    public $institution_id;
    #[Validate('required', as: 'De beschrijving')]
    public $classroom_description;
    #[Validate('required', as: 'De korte beschrijving')]
    public $short_description;
    #[Validate('required', as: 'De opmerking')]
    public $note;
    #[Validate('required', as: 'De eerste specificatie')]
    public $first_specification;
    #[Validate('required', as: 'De tweede specificatie')]
    public $second_specification;

    public function updateKey(Classroom $classroom)
    {
        $this->validateOnly('key_id');
        $classroom->update([
            'key_id' => $this->key_id,
//            'classroom_name' => $this->classroom_name,
//            'classroom_block' => $this->classroom_block,
//            'institution_id' => $this->institution_id,
//            'classroom_description' => $this->classroom_description,
//            'short_description' => $this->short_description,
//            'note' => $this->note,
//            'first_specification' => $this->first_specification,
//            'second_specification' => $this->second_specification,
        ]);
    }
}
