<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\Student;

class StudentFees extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
  
}
