<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

//Route::get('admin/keys', Keys::class)->name('admin.keys');



Route::redirect('/', 'login');

Route::group(['middleware' => ['web']], function () {
   Route::get('login', [AuthController::class, 'login'])->name('login');
   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('connect', [AuthController::class, 'connect'])->name('connect');
   Route::get('profile',[AuthController::class, 'getAuthUser'])->name('profile');
});

//Route::group(['middleware' => ['web','MsGraphAuthenticated'], 'prefix' => 'admin'], function () {
//    Route::get('{view}',ApplicationController::class)->where(['view' => '.*']);
//});
Route::group(['middleware' => ['web', 'MsGraphAuthenticated']], function () {
    Route::get('home', [PagesController::class, 'home'])->name('home');
});

//Route::group(['middleware' => ['web', 'guest'], 'namespace' => 'App\Http\Controllers\Auth'], function(){
//    Route::get('login', 'AuthController@login')->name('login');
//    Route::get('connect', 'AuthController@connect')->name('connect');
//});
//
//Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app', 'namespace' => 'App\Http\Controllers'], function(){
//    Route::get('/', 'PagesController@app')->name('app');
//    Route::get('logout', 'Auth\AuthController@logout')->name('logout');


    Route::get('admin/keys', Keys::class)->name('admin.keys');
    Route::get('admin/persons', Persons::class)->name('admin.persons');
    Route::get('admin/classrooms', Classrooms::class)->name('admin.classrooms');
    Route::get('admin/key-storage', KeyStorage::class)->name('admin.key-storage');


//});

//When using with existing users then expect a user to be logged in and use auth middleware
//Route::group(['middleware' => ['web', 'auth']], function(){
//    Route::get('msgraph', function(){
//
//        if (! MsGraph::isConnected()) {
//            return redirect('msgraph/connect');
//        } else {
//            //display your details
//            return MsGraph::get('me');
//        }
//
//    });
//
//    Route::get('msgraph/connect', function(){
//        return MsGraph::connect();
//    });
//});

//Or using a middleware route, if the user does not have a graph token then automatically redirect to get authenticated
//Route::group(['middleware' => ['web', 'MsGraphAuthenticated']], function(){
//    Route::get('msgraph', function(){
//        return MsGraph::get('me');
//    });
//});
//
//Route::get('msgraph/connect', function(){
//    return MsGraph::connect();
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
