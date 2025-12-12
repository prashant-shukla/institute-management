<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsFeedback extends Model
{
    protected $table = 'students_feedback';

    protected $fillable = [
        'student_id',
        'q1','q2','q3','q4','q5',
        'q6','q7','q8','q9','q10','q11',
        'comments',
    ];

    public function student()
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id');
    }
}
