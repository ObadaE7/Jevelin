<?php

namespace App\Livewire\Home\Pages;

use App\Models\Post;
use Livewire\{Component, WithPagination};

class Articles extends Component
{
    use WithPagination;

    public function getArticles()
    {
        return Post::paginate(5);
    }

    public function render()
    {
        $articles = $this->getArticles();
        return view('pages.home.pages.articles', compact('articles'))->layout('layouts.guest');
    }
}
