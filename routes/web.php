<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\DataController;

Route::get('/', [UserController::class, 'index'])->name('home');

// User
Route::prefix('user')->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLoginPage'])->name('login');
    Route::get('/register', [UserAuthController::class, 'showRegisterPage'])->name('register');
    Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [UserController::class, 'index'])->name('user.show.home');
        Route::get('/cards', [UserController::class, 'showCards'])->name('user.show.cards');
        Route::get('/card-transaction', [UserController::class, 'showCards'])->name('user.show.transactions');
        Route::get('/add-card', [UserController::class, 'showAddCard'])->name('user.show.add-card');
        Route::post('/add-card', [UserController::class, 'store'])->name('user.add.card');
    });
});

Route::get('/data/tariffs/{id}', [DataController::class, 'getTariffsByCity']);

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'loginPage'])->name('admin.show.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});

Route::fallback(function () {
    return view('404');
});
