<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\StudentFees as Fee;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['software_covered' => 'array'];

   
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
        
    }
    
    public function center(): HasMany
    {
        return $this->hasMany(Center::class);
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

    
}
