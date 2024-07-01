<?php

namespace App\Livewire\User;

use App\Models\{Post, Category, Tag};
use App\Traits\ImageProcessTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\{Component, WithFileUploads};

class CreatePost extends Component
{
    use WithFileUploads, ImageProcessTrait;
    public $image;
    public $title;
    public $subtitle;
    public $slug;
    public $content;
    public $status;
    public $category_id;
    public $tag_ids = [];

    public function updatedTitle()
    {
        $this->slug = $this->makeSlug($this->title);
    }

    public function create()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:150',
            'slug' => 'required|string|alpha_dash|max:120|unique:posts,slug',
            'content' => 'required|string|max:10000',
            'image' => 'required|file|image|max:1024|mimes:jpeg,png,jpg',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'required|array|exists:tags,id',
            'status' => 'required|string|in:draft,published',
        ]);

        $userId = auth()->user()->id;
        $validated['user_id'] = $userId;
        $validated['image'] = $this->coverImage($validated['image'], 800, 800, 'posts');
        try {
            $post = Post::create($validated);
            $post->categories()->attach($this->category_id);
            foreach ($this->tag_ids as $tag) {
                $post->tags()->attach($tag);
            }
            session()->flash('success', trans('The post was created successfully'));
            $this->resetFields();
        } catch (Exception $e) {
            Log::error('[createPost]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to create the post'));
        }
    }

    protected function makeSlug($string, $separator = '-')
    {
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace('/\s+/', $separator, $string);
        $string = preg_replace('/[^\p{L}\p{N}]+/u', $separator, $string);
        $string = preg_replace('/' . preg_quote($separator) . '+/', $separator, $string);
        $string = trim($string, $separator);
        return $string;
    }

    public function resetFields()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.dashboard.create-post', compact('categories', 'tags'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
