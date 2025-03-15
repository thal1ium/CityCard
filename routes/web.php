<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;

Route::get("/", [UserController::class, "index"])->name('');

// User
Route::get('/login', [UserAuthController::class, 'showLoginPage'])->name('login');
Route::get('/register', [UserAuthController::class, 'showRegisterPage'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::middleware('auth:web')->group(function () {
  Route::get('/home', [UserController::class, 'index'])->name('user.show.home');
  Route::get('/cards', [UserController::class, 'showCards'])->name('user.show.cards');
});


// Admin
Route::get('/admin/login', [AdminAuthController::class, 'loginPage'])->name('admin.show.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::fallback(function () {
  return view('404');
});