<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'title',
        'username',
        'first_name',
        'last_name',
        'all_members_are_administrators',
    ];
}
