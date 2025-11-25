<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    protected $courseId;

    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }

    public function model(array $row)
    {
        return new Question([
            'course_id'      => $this->courseId,
            'question'       => $row['question'] ?? null,
            'image'          => $row['image'] ?? null,
            'dwg_file'       => $row['dwg_file'] ?? null,
            'option_a'       => $row['option_a'] ?? null,
            'option_b'       => $row['option_b'] ?? null,
            'option_c'       => $row['option_c'] ?? null,
            'option_d'       => $row['option_d'] ?? null,
            'correct_option' => $row['correct_option'] ?? 'A',
            'marks'          => $row['marks'] ?? 1,
            'status'         => $row['status'] ?? 1,
        ]);
    }
}
