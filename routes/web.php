<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('petas', PetaController::class);
