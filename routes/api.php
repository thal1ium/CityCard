<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TariffController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\CityTariffController;
use App\Http\Controllers\Api\Auth\UserAuthController;
use App\Http\Controllers\Api\Auth\AdminAuthController;

Route::prefix('user')->group(function () {
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::middleware('auth:sanctum')->post('/logout', [UserAuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')
    ->prefix('user')
    ->group(function () {
        Route::prefix('cards')->group(function () {
            Route::apiResource('/', UserController::class)->only('index', 'store', 'create');
            Route::get('/transactions', [UserController::class, 'transactions']);
        });
        Route::prefix('wallet')->group(function () {
            Route::apiResource('/', WalletController::class)->only('index', 'store', 'create');
            Route::get('/refill', [WalletController::class, 'refill']);
        });
    });

Route::get('/cities/{city}/tariffs', [CityTariffController::class, 'getTariffsByCity']);

Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AdminAuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')
    ->prefix('admin')
    ->group(function () {
        Route::apiResource('cities', CityController::class)->only('index', 'store', 'update', 'destroy');
        Route::apiResource('tariffs', TariffController::class)->only('index', 'store', 'update', 'destroy');
        Route::apiResource('transports', TransportController::class)->only('index', 'store', 'update', 'destroy');
        Route::apiResource('city-tariffs', CityTariffController::class)->only('index', 'store', 'update', 'destroy');
    });
