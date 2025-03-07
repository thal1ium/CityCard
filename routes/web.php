<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;

Route::get('/', [UserController::class, 'index'])->name('user.show.home');

// User 
Route::get('/login', [UserAuthController::class, 'showLoginPage'])->name('user.show.login');
Route::get('/register', [UserAuthController::class, 'showRegisterPage'])->name('user.show.register');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

// Admin
Route::get('/admin/login', [AdminAuthController::class, 'loginPage'])->name('admin.show.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::middleware('auth:admin')->group(function () {
  Route::get('/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
});