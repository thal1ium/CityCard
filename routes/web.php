<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CityTariffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\TransportControler;
use App\Models\CityTariff;

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

Route::get('/data/tariffs/{id}', [CityTariff::class, 'getTariffsByCity']);

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'loginPage'])->name('show.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', function() {
            return view("admin.index");
        })->name('index');

        Route::resource('/cities', CityController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('/tariffs', TariffController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('/transports', TransportControler::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('/city-tariffs', CityTariffController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
    });
});

Route::fallback(function () {
    return view('404');
});
