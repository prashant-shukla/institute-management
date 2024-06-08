<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\StudentFees as Fee;
class StudentCourses extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = ['software_covered' => 'array'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}

