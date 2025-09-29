<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProudStudent extends Model
{
        protected $fillable = [
        'name',
        'image',
        'role',
        'company',
        'company_url',
        'rating',
        'message',
        'package',
    ];
}
