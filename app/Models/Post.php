<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'slug',
        'content',
        'image',
        'status',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_users');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateForHuman()
    {
        return $this->created_at->format('M d, Y');
    }

    public function scopeIsVisible($query)
    {
        return $query->where('status', 'published');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_users')
            ->wherePivot('reaction', '=', 'like');
    }

    public function dislikes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_users')
            ->wherePivot('reaction', '=', 'dislike');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'likable');
    }
}
