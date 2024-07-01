<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'likable_id',
        'likable_type',
        'type',
    ];

    public function likable(): MorphTo
    {
        return $this->morphTo();
    }
}
