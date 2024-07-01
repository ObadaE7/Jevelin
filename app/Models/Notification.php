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
        'notifiable_id',
        'notifiable_type',
        'type',
        'data',
        'read_at',
    ];

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    protected $casts = [
        'data' => 'array',
    ];

    public function setDataAttribute($data)
    {
        $this->attributes['user_id'] = auth()->id();
        $this->attributes['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
