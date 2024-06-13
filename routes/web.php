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
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

require __DIR__ . '/auth.php';

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        require __DIR__ . '/auth.php';
    });
