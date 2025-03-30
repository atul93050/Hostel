<?php

use App\Http\Controllers\RoomController;
// use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
    // Route::get('arpit/registration',function(){
    //     return view('arpit.room-registration');
    // });
    // Route::view('arpit/registration','arpit.room-registration');
    
    Route::get('registration',[RoomController::class, 'roomRegistration']);
    Route::post('registration',[RoomController::class, 'roomRegisterd'])->name('room.registration');
?>


