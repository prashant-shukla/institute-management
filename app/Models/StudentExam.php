<?php

namespace App\Models;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    protected $fillable = [
        'student_id',
        'exam_id',
        'exam_fee',
        'gst_amount',
        'total_fee',
        'status',
        'enrolled_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}

