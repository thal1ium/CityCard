<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('user.show.home');

Route::get('/login', [AuthController::class,'loginPage'])->name('auth.show.login');
Route::get('/registration', [AuthController::class,'registrationPage'])->name('auth.show.registration');