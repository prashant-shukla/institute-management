<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function exams()
    {
        return $this->hasMany(Exam::class, 'exam_category_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
