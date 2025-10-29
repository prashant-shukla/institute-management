<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\ExamQuestion;

class Question extends Model
{
    use HasRoles;
    use HasFactory;

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
    

    // 🔗 Relation: Each question belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_question', 'question_id', 'exam_id');
    }
    

}
