<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'category',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
