<?php

namespace App\Livewire\Home\Pages;

use App\Models\Post;
use Livewire\{Component, WithPagination};

class Articles extends Component
{
    use WithPagination;

    public function articles()
    {
        return Post::paginate(5);
    }

    public function render()
    {
        $articles = $this->articles();
        return view('pages.home.pages.articles', compact('articles'))->layout('layouts.guest');
    }
}
