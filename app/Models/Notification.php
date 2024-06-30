<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at',
    ];

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }
}