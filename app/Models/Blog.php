<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'slug',
        'software_id',
        'tags',
        'short_description',
        'description',
        'link',
        'created_by',
        'created',
        'site_title',
        'meta_keywords',
        'meta_description',
    ];
}
