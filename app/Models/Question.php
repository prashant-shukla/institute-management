<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Question extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'course_id',
        'question',
        'image',
        'dwg_file',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
        'marks',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_question', 'question_id', 'exam_id');
    }
}
