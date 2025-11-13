<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Blog extends Model
{
    use HasFactory;
    use HasRoles; 
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
