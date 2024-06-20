<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
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
        $this->slug = str()->slug($this->title);
    }

    private function handleImageUpload($image)
    {
        return $image ? $image->store('posts', 'public') : null;
    }

    public function create()
    {
        $validated = $this->validate([
            'title' => 'required|string|min:5|max:100',
            'subtitle' => 'required|string|min:5|max:150',
            'slug' => 'required|string|alpha_dash|min:5|max:120|unique:posts,slug',
            'content' => 'required|string|min:10|max:10000',
            'image' => 'required|file|image|max:1024|mimes:jpeg,png,jpg',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'required|array|exists:tags,id',
            'status' => 'required|string|in:draft,published',
        ]);

        $userId = auth()->user()->id;
        $validated['user_id'] = $userId;
        $validated['image'] = $this->handleImageUpload($validated['image'] ?? null);
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

    public function resetFields()
    {
        // dd('reset');
        $this->title = '';
        $this->subtitle = '';
        $this->slug = '';
        $this->content = '';
        $this->image = null;
        $this->category_id = null;
        $this->tag_ids = [];
        $this->status = '';

        Log::info('Post creation form reset: ', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'tag_ids' => $this->tag_ids,
            'status' => $this->status,
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.create-post', compact('categories', 'tags'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
