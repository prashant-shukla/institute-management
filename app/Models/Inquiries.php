<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function courseCategory() {
        return $this->belongsTo(CourseCategory::class);
    }
    
    public function tool() {
        return $this->belongsTo(Tool::class);
    }
}
