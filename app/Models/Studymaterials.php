<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Course;
use App\Models\User;

class Studymaterials extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
