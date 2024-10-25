<?php

use App\Livewire\Keys;
use Illuminate\Support\Facades\Route;

Route::get('user', function () {
    return 'The users';
});

Route::view('/', 'home')->name('home');
Route::view('key', 'key')->name('key');
Route::view('playground', 'playground')->name('playground');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/keys');
    Route::get('keys', Keys::class)->name('keys');
    Route::get('person', Keys::class)->name('person');
//    Route::get('keys', function () {
//        $keys = [
//            'Sleutel 1',
//            'Sleutel 2',
//            'Sleutel 3'
//        ];
//        return view('admin.keys.index', compact('keys'));
//    })->name('keys');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
