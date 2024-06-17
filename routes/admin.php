<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Livewire\Admin\Tables\{CategoryTable, CountryTable, PostTable, RoleTable, TagTable, UserTable};
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
            Route::get('roles', RoleTable::class)->name('roles');
            Route::get('countries', CountryTable::class)->name('countries');
            Route::get('categories', CategoryTable::class)->name('categories');
            Route::get('tags', TagTable::class)->name('tags');
            Route::get('users', UserTable::class)->name('users');
            Route::get('posts', PostTable::class)->name('posts');
        });
    });
