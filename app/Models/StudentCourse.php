<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'exam_id',
        'course_fee',
        'gst',
        'discount',
        'total_fee',
        'mode',
        'status',
        'enrolled_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
       public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    
}

