<?php

namespace App\Livewire;

use App\Events\CommentCreated;
use App\Models\{Post, Comment, CommentLike, Notification, User};
use Livewire\Component;
use Illuminate\Database\Eloquent\Relations\Relation;

class Comments extends Component
{
    public $article;
    public $comment;
    public $parent_id = null;
    protected $listeners = ['comment-created' => 'getComments'];

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

        broadcast(new CommentCreated($comment))->toOthers();

        $post = Post::find($comment->post_id);

        Notification::create([
            'user_id' => auth()->id(),
            'type' => CommentCreated::class,
            'notifiable_type' => User::class,
            'notifiable_id' => $comment->id,
            'data' => json_encode([
                'message' => 'قام ' . auth()->user()->fname  . ' ' . auth()->user()->lname . ' بالتعليق على مقالك',
                'url' => route('article', $post->slug),
            ]),
        ]);

        $this->reset(['comment', 'parent_id']);
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
