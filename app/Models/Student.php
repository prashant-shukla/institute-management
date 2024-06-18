<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\User;
use App\Models\StudentFees as Fee;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['software_covered' => 'array'];
  //  protected $fillable = [
    //    'photo','user_id', 'reg_no', 'reg_date'
        
  //  ];
    // protected $fillable = [];
   
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);        
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student_courses(): BelongsTo
    {
        return $this->belongsTo(StudentCourse::class);
    }

    public function student_fees(): BelongsTo
    {
        return $this->belongsTo(StudentFees::class);
    }
    
    public function getFullNameAttribute()
    {
        return $this->user->firstname . ' ' . $this->user->lastname;
    }
    // public function storePhoto($photo)
    // {
    //     $this->photo = $photo->store('photos', 'public');
    //     $this->save();
    // }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $latestStudent = Student::orderBy('reg_no', 'desc')->first();
            $student->reg_no = $latestStudent ? $latestStudent->reg_no + 1 : 10000;
            if (empty($student->reg_date)) {
                $student->reg_date = now();
            }
        });
    }
}
