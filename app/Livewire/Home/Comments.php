<?php

namespace App\Livewire\Home;

use App\Events\CommentCreated;
use App\Models\{Post, Comment, CommentLike};
use App\Notifications\CommentCreatedNotification;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On;

class Comments extends Component
{
    public $article;
    public $comment;
    public $parent_id = null;

    public function mount(Post $article)
    {
        $this->article = $article;
    }

    public function create()
    {
        $this->validate(['comment' => 'required|string|max:500']);
        $comment = Comment::create([
            'parent_id' => $this->parent_id,
            'post_id' => $this->article->id,
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);
        $post = Post::find($comment->post_id);
        $user = $post->owner;

        Notification::send($user, new CommentCreatedNotification($comment));

        $this->dispatch('push-event');
        $this->reset(['comment', 'parent_id']);
    }

    #[On('push-event')]
    public function notifyCommentCreated()
    {
        event(new CommentCreated());
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id === auth()->id()) {
            $comment->delete();
        }
    }

    public function setParent($id)
    {
        $this->parent_id = $id;
    }

    public function cancelReply()
    {
        $this->parent_id = null;
        $this->reset(['comment', 'parent_id']);
        $this->resetErrorBag();
    }

    public function likeComment($id)
    {
        $like = CommentLike::where('comment_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($like) {
            $like->delete();
        } else {
            CommentLike::create([
                'comment_id' => $id,
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function getComments()
    {
        return $this->article->comments()
            ->whereNull('parent_id')
            ->with('user')
            ->latest()
            ->get();
    }

    public function render()
    {
        $comments = $this->getComments();
        return view('components.comments', compact('comments'));
    }
}
