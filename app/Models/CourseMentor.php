<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CourseMentor extends Model
{
    use HasFactory;
    protected $table = 'course_mentor';
    protected $guarded = ['id'];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
