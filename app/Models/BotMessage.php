<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'chat_id',
        'user_id',
        'text',
        'entities',
    ];

    protected $casts = [
        'entities' => 'array',
    ];
}
