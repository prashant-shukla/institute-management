<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSyllabuses extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'extra_info' => 'array',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
