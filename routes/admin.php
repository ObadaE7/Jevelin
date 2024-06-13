<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

#.....{ Dashboard Page }.....#
Route::prefix('dashboard')
    ->middleware(['auth:admin', 'verified'])
    ->group(function () {
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
