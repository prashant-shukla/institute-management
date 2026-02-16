<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CourseCategory;
use App\Models\CourseMentor;
use App\Models\Mentor;
use App\Models\Tool;
use App\Models\CourseSyllabuses;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'popular_course' => 'boolean',
        'faqs' => 'array',
    ];

    public function courseSyllabuses()
    {
        return $this->hasMany(CourseSyllabuses::class);
    }
    public function courseCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'course_categories_id'); // Assuming this is the correct foreign key
    }



    public function mentors(): BelongsToMany
    {
        return $this->BelongsToMany(Mentor::class);
    }

    public function courseMentor(): BelongsToMany
    {
        return $this->BelongsToMany(CourseMentor::class, 'mentor_id');
    }
    public function courseTool()
    {
        return $this->hasMany(CourseTool::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }
}
