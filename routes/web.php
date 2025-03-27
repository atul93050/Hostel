<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/register','showRegisteration')->name('showRegister');
    Route::post('/register','register')->name('submit.register');
});
