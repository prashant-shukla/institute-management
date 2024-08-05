<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Course;
use App\Models\User;

class StudyMaterial extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

     protected $fillable = [
        'id',
        'title',
        'description',
        'file_type',
        'file_path',
        'uploaded_by',
        'upload_date',
        'course_id',
    ];
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($feedback) {
            $feedback->upload_date = now(); // or use $feedback->setAttribute('upload_date', now());
        });
    }
}
