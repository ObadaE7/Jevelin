<?php

namespace App\Livewire\Home\Pages;

use App\Models\Post;
use Livewire\Component;

class Article extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getArticle()
    {
        return Post::where('slug', $this->slug)->first();
    }

    public function render()
    {
        $article = $this->getArticle();

        return view('pages.home.pages.article', compact('article'))->layout('layouts.guest');
    }
}
