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
     * Relationship: Each exam belongs to one exam category.
     */
    public function category()
    {
        return $this->belongsTo(ExamCategory::class, 'exam_category_id');
    }

    /**
     * Relationship: Fetch questions linked to the same exam category.
     */
    // public function questions()
    // {
    //     return $this->hasMany(Question::class, 'exam_category_id', 'exam_category_id');
    // }
    public function questions()
{
    return $this->belongsToMany(Question::class, 'exam_question', 'exam_id', 'question_id');
}

}
