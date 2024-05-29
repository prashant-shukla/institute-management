<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   // protected $casts = ['max_software' => 'array'];
    protected $casts = [
        'max_software' => 'integer',
    ];
}
