<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Certificate_fields;
class Certificate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    } 

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    protected $casts = ['elements' => 'array'];
    // protected $casts = [
    //     'elements' => 'array',
    // ];
    public function Certificate_fields(): HasMany
    {
        return $this->hasMany(Certificate_fields::class);
    }
  
}
