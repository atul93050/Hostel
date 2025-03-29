<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/register','showUserRegisteration')->name('showRegister');
    Route::post('/register','register')->name('submit.register');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','showLogin')->name('showLogin');
    Route::post('/login','login')->name('submit.login');
});