<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CourseCategory;
use App\Models\CourseMentor; // Ensure this import is present
use App\Models\Mentor; 

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'popular_course' => 'boolean',
        'faqs' => 'array',
    ];

    /**
     * Get the course category that owns the course.
     */
    public function courseCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }


    public function mentors(): BelongsToMany
    {
        return $this->BelongsToMany(Mentor::class);
    }

}
