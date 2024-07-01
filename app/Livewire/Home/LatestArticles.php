<?php

namespace App\Livewire\Home;

use App\Events\ArticleReactionEvent;
use App\Models\Post;
use App\Models\Reaction;
use App\Notifications\ArticleReactionsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class LatestArticles extends Component
{
    public function getLatestArticles()
    {
        return Post::latest()
            ->take(3)
            ->withCount([
                'reactions as likes_count' => function ($query) {
                    $query->where('type', 1);
                },
                'reactions as dislikes_count' => function ($query) {
                    $query->where('type', 0);
                }
            ])
            ->get();
    }

    public function like($id)
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $post = Post::find($id);

        $existingLike = Reaction::where('user_id', $user->id)
            ->where('type', 1)
            ->where('likable_id', $post->id)
            ->where('likable_type', get_class($post))
            ->first();

        if ($existingLike) {
            if ($existingLike->type == 1) {
                $existingLike->delete();
            } else {
                $existingLike->update(['type' => 1]);
            }
        } else {
            Reaction::create([
                'user_id' => $user->id,
                'type' => 1,
                'likable_id' => $post->id,
                'likable_type' => get_class($post),
            ]);
            Notification::send($post->owner, new ArticleReactionsNotification($post, 'like'));
        }
        $this->dispatch('push-reaction');
    }

    public function dislike($id)
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $post = Post::find($id);

        $existingLike = Reaction::where('user_id', $user->id)
            ->where('type', 0)
            ->where('likable_id', $post->id)
            ->where('likable_type', get_class($post))
            ->first();

        if ($existingLike) {
            if ($existingLike->type == 0) {
                $existingLike->delete();
            } else {
                $existingLike->update(['type' => 0]);
            }
        } else {
            Reaction::create([
                'user_id' => $user->id,
                'type' => 0,
                'likable_id' => $post->id,
                'likable_type' => get_class($post),
            ]);
            Notification::send($post->owner, new ArticleReactionsNotification($post, 'dislike'));
        }
        $this->dispatch('push-reaction');
    }

    #[On('push-reaction')]
    public function notifyArticleReaction()
    {
        event(new ArticleReactionEvent());
    }

    public function render()
    {
        $latestArticles = $this->getLatestArticles();

        return view('pages.home.latest-articles', compact('latestArticles'));
    }
}
