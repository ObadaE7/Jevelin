<?php

use App\Livewire\Home\Index;
use App\Livewire\Home\Pages\{Articles, Article, ArticlesByCategory, ArticlesByTag, Categories, Writers};
use App\Livewire\User\{Profile, Analysis, Posts, CreatePost};
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
Route::get('articles', Articles::class)->name('articles');
Route::get('article/{slug}', Article::class)->name('article');
Route::get('articles-tagged/{slug}', ArticlesByTag::class)->name('articles.tagged');
Route::get('categories', Categories::class)->name('categories');
Route::get('articles-category/{slug}', ArticlesByCategory::class)->name('articles.category');
Route::get('writers', Writers::class)->name('writers');

#.....{ Dashboard Page }.....#
Route::prefix('dashboard')
    ->as('user.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
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
