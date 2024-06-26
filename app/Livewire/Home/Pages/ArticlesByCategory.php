<?php

namespace App\Livewire\Home\Pages;

use App\Models\Category;
use Livewire\{Component, WithPagination};

class ArticlesByCategory extends Component
{
    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function articlesByCategory()
    {
        $category = Category::where('slug', $this->slug)->firstOrFail();
        $articles = $category->posts()->withCount('likes')->paginate(4);
        return compact('category', 'articles');
    }

    public function render()
    {
        $data = $this->articlesByCategory();

        return view('pages.home.pages.articles-by-category', compact('data'))->layout('layouts.guest');
    }
}
