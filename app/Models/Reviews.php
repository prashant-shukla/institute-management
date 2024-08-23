<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;
class Reviews extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'student_id',
        'review',
        'course_id',
        'status',
    ];
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
{
    return $this->belongsTo(Course::class);
}

}
