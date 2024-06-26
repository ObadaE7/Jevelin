<?php

namespace App\Livewire\Home\Pages;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public function categories()
    {
        return Category::withCount('posts')->paginate(4);
    }

    public function render()
    {
        $categories = $this->categories();

        return view('pages.home.pages.categories', compact('categories'))->layout('layouts.guest');
    }
}
