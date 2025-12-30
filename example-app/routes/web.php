<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register-event', [RegistrationController::class, 'register'])->name('register.event');
