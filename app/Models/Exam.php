<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'exam_category_id',
        'total_questions',
        'total_marks',
        'duration',
        'status',
    ];

    /**
     * Each Exam belongs to one ExamCategory.
     */
    public function category()
    {
        return $this->belongsTo(ExamCategory::class, 'exam_category_id');
    }

    /**
     * Each Exam has many Questions (via pivot table exam_question).
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_question', 'exam_id', 'question_id');
    }
    public function studentAnswers()
    {
        return $this->hasMany(\App\Models\StudentAnswer::class, 'exam_id');
    }
    public function students()
    {
        return $this->hasMany(StudentExam::class);
    }
}
