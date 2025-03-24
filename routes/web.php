<?php

use App\Livewire\Admin\Classrooms;
use App\Livewire\Admin\Keys;
use App\Livewire\Admin\KeyStorage;
use App\Livewire\Admin\Persons;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

/*
Route::group(['middleware' => ['web']], function () {
   Route::get('login', [AuthController::class, 'login'])->name('login');
  // Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('connect', [AuthController::class, 'connect'])->name('connect');
   Route::get('profile',[AuthController::class, 'getAuthUser'])->name('profile');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated']], function () {
    Route::get('home', [PagesController::class, 'home'])->name('home');
});
*/

Route::group(['middleware' => ['web', 'guest'], 'namespace' => 'App\Http\Controllers\Auth'], function(){
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('connect', 'AuthController@connect')->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('/home', 'PagesController@home')->name('home');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout2');

    Route::get('admin/keys', 'Keys@render')->name('admin.keys');
    Route::get('admin/persons', 'Persons@render')->name('admin.persons');
    Route::get('admin/classrooms', 'Classrooms@render')->name('admin.classrooms');
    Route::get('admin/key-storage', 'KeyStorage@render')->name('admin.key-storage');

//    Route::get('admin/keys', Keys::class)->name('admin.keys');
//    Route::get('admin/persons', Persons::class)->name('admin.persons');
//    Route::get('admin/classrooms', Classrooms::class)->name('admin.classrooms');
//    Route::get('admin/key-storage', KeyStorage::class)->name('admin.key-storage');

});


//Route::middleware('can:admin-access')->prefix('admin')->group(function(){


//    Route::get('admin/keys', Keys::class)->name('admin.keys');
//    Route::get('admin/persons', Persons::class)->name('admin.persons');
//    Route::get('admin/classrooms', Classrooms::class)->name('admin.classrooms');
//    Route::get('admin/key-storage', KeyStorage::class)->name('admin.key-storage');
//});




//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/welcome', function () {
//        return view('welcome');
//    })->name('welcome');
//});
