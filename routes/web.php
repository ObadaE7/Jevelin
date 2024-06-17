<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

#.....{ Main Page }.....#
Route::get('/', IndexController::class)->name('index');

#.....{ Dashboard Page }.....#
Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [DashboardController::class, 'index'])->name('profile');
        Route::get('analysis', [DashboardController::class, 'analysis'])->name('analysis');
        Route::get('posts', [DashboardController::class, 'index'])->name('posts');
        Route::get('create-post', [DashboardController::class, 'index'])->name('create.post');
    });

require __DIR__ . '/auth.php';

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        require __DIR__ . '/auth.php';
    });
