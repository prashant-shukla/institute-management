<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'organizer',
        'start_date',
        'end_date',
        'paid',
        'photo',
        'address',
        'location',
        'description',
        'site_title',
        'meta_keyword',
        'meta_description',
    ];
}
