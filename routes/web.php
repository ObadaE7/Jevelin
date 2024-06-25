<?php

use App\Livewire\Home\Index;
use App\Livewire\User\{Dashboard, Profile, Analysis, Posts, CreatePost};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

#.....{ Main Page }.....#
Route::get('/', function () {
    return view('under-dev');
});

Route::get('/index', Index::class)->name('index');

#.....{ Dashboard Page }.....#
Route::prefix('dashboard')
    ->as('user.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::get('profile', Profile::class)->name('profile');
        Route::get('analysis', Analysis::class)->name('analysis');
        Route::get('posts', Posts::class)->name('posts');
        Route::get('create-post', CreatePost::class)->name('create.post');
    });

require __DIR__ . '/auth.php';

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        require __DIR__ . '/auth.php';
    });
