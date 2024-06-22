<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CourseCategories;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   // protected $casts = ['max_software' => 'array'];
    protected $casts = [
        'popular_course' => 'boolean',
    ];
   
    /**
     * Get the branch that owns the course.
     */
    public function CourseCategories(): BelongsTo
    {
        return $this->belongsTo(coursecategories::class);
        
    }

   
}
