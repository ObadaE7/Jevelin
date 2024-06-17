<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth:admin', 'verified'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [DashboardController::class, 'index'])->name('profile');
        Route::get('settings', [DashboardController::class, 'index'])->name('settings');

        Route::prefix('table')->group(function () {
            Route::get('roles', [DashboardController::class, 'index'])->name('roles');
            Route::get('countries', [DashboardController::class, 'index'])->name('countries');
            Route::get('categories', [DashboardController::class, 'index'])->name('categories');
            Route::get('tags', [DashboardController::class, 'index'])->name('tags');
            Route::get('users', [DashboardController::class, 'index'])->name('users');
            Route::get('posts', [DashboardController::class, 'index'])->name('posts');
        });
    });
