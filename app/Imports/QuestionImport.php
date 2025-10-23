<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    protected $courseId;

    // 👇 Constructor to accept course_id
    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_question', 'question_id', 'exam_id');
    }
    
    public function model(array $row)
    {
        return new Question([
            'course_id' => $this->courseId, // ✅ use selected course
            'question' => $row['question'],
            'option_a' => $row['option_a'] ?? null,
            'option_b' => $row['option_b'] ?? null,
            'option_c' => $row['option_c'] ?? null,
            'option_d' => $row['option_d'] ?? null,
            'correct_option' => $row['correct_option'],
            'marks' => $row['marks'] ?? 1,
            'status' => $row['status'] ?? 1,
        ]);
    }
}
