<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $latestArticles = $this->latestArticles();
        $topPost = $this->topPost();
        $topPosts = $this->topPosts();
        return view('index', compact('latestArticles', 'topPost', 'topPosts'));
    }

    public function latestArticles()
    {
        return Post::withCount(['likes', 'dislikes'])->latest()->take(3)->get();
    }

    public function topPost()
    {
        // Return the first top post
        return Post::withCount('users')->orderByDesc('users_count')->first();
    }

    public function topPosts()
    {
        // Return the next two top posts
        return Post::withCount('users')->orderByDesc('users_count')->limit(3)->skip(1)->get();
    }
}
