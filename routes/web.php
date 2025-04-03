<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CityTariffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\TransportControler;
use App\Http\Controllers\WalletController;

Route::view('/', 'home')->name('index');
Route::get('/login', [UserAuthController::class, 'showLoginPage'])->name('login');

// User
Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/login', [UserAuthController::class, 'showLoginPage'])->name('show.login');
        Route::get('/register', [UserAuthController::class, 'showRegisterPage'])->name('show.register');
        Route::post('/login', [UserAuthController::class, 'login'])->name('login');
        Route::post('/register', [UserAuthController::class, 'register'])->name('register');
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

        Route::middleware('auth:web')->group(function () {
            Route::prefix('cards')->group(function() {
                Route::get('/', [UserController::class, 'index'])->name('show.cards');
                Route::get('/transactions', [UserController::class, 'transactions'])->name('show.transactions');
                Route::get('/create', [UserController::class, 'create'])->name('show.add-card');
                Route::post('/create', [UserController::class, 'store'])->name('add.card');
            });

            Route::prefix('wallet')->name('wallet.')->group(function () {
                Route::get('/', [WalletController::class, 'index'])->name('index');
                Route::get('/create', [WalletController::class, 'create'])->name('create');
                Route::post('/store', [WalletController::class, 'store'])->name('store');
                Route::post('/card-refill', [WalletController::class, 'refill'])->name('refill');
            });
        });
    });

Route::get('/cities/{city}/tariffs', [CityTariffController::class, 'getTariffsByCity']);

// Admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginPage'])->name('show.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::middleware('auth:admin')->group(function () {
            Route::view('/', 'admin.index')->name('index');

            Route::resource('/cities', CityController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
            Route::resource('/tariffs', TariffController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
            Route::resource('/transports', TransportControler::class)->only(['index', 'create', 'store', 'update', 'destroy']);
            Route::resource('/city-tariffs', CityTariffController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        });
    });

Route::fallback(function () {
    return view('404');
});
