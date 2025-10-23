<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $table = 'exam_question';

    protected $fillable = [
        'exam_id',
        'question_id',
    ];

    /**
     * Get the exam associated with this record.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    /**
     * Get the question associated with this record.
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
