<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = ['software' => 'array'];

    /**
     * Get the courses for the branch.
     */
    // public function courses(): HasMany
    // {
    //     return $this->hasMany(Course::class);
    // }
}
