<?php

namespace App\Livewire;

use App\Models\Key;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Keys extends Component
{
    use WithPagination;

    // public props
    public $perPage = 10;
    #[Layout('layouts.key-management', [
        'title' => 'Keys title',
        'subtitle' => 'Keys subtitle',
        'description' => 'Keys description',
    ])]
    public function render()
    {
        $keys = Key::orderBy('id')
            ->paginate($this->perPage);
        return view('livewire.keys', compact('keys'));
    }
}
