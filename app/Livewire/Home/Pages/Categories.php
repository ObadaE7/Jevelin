<?php

namespace App\Livewire\Home\Pages;

use App\Models\Category;
use Livewire\{Component, WithPagination};

class Categories extends Component
{
    use WithPagination;

    public function getCategories()
    {
        return Category::withCount('posts')->paginate(4);
    }

    public function render()
    {
        $categories = $this->getCategories();

        return view('pages.home.pages.categories', compact('categories'))->layout('layouts.guest');
    }
}
