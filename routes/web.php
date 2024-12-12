<?php

use App\Livewire\Admin\Keys;
use App\Livewire\Admin\Persons;
use App\Livewire\Admin\Classrooms;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('admin/keys', Keys::class)->name('admin.keys');
Route::get('admin/persons', Persons::class)->name('admin.persons');
Route::get('admin/classrooms', Classrooms::class)->name('admin.classrooms');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
