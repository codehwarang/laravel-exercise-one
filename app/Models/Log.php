<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Level;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'level',
        'message',
        'context',
        'extra'
    ];

    protected function casts()
    {
        return [
            'level' => Level::class,
            'context' => 'array',
            'extra' => 'array'
        ];
    }
}
