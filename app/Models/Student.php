<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\User;
use App\Models\StudentExam;
use App\Models\StudentFees;


class Student extends Model
{
    use HasFactory;


    protected $table = 'students';

    protected $guarded = ['id'];

    protected $casts = ['software_covered' => 'array'];
    protected $appends = ['full_name'];


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function student_fees(): HasMany
    {
        return $this->hasMany(StudentFees::class);
    }
    public function attendances()
    {
        return $this->hasMany(\App\Models\StudentAttendance::class, 'student_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }
    // public function review(): BelongsTo
    // {
    //     return $this->belongsTo(Reviews::class);
    // }
    // public function student_courses(): BelongsTo
    // {
    //     return $this->belongsTo(StudentCourse::class);
    // }
    public function feeReceipts()
    {
        return $this->hasMany(StudentFees::class, 'student_id');
    }

    // public function student_fees(): BelongsTo
    // {
    //     return $this->belongsTo(StudentFees::class);
    // }

    public function getFullNameAttribute()
    {
        return trim(($this->user?->firstname ?? '') . ' ' . ($this->user?->lastname ?? ''));
    }

    public function storePhoto($photo)
    {
        $this->photo = $photo->store('photos', 'public');
        $this->save();
    }


    public function getCertificateAssignedAttribute()
    {
        return \App\Models\Certificate::where('student_id', $this->id)
            ->where('course_id', $this->course_id)
            ->exists();
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }
    public function exams()
    {
        return $this->hasMany(StudentExam::class);
    }
    protected static function booted()
    {
        static::creating(function ($student) {

            $prefix = 'CA1001/';

            $lastReg = self::where('reg_no', 'like', $prefix . '%')
                ->orderByDesc('id')
                ->value('reg_no');

            if ($lastReg) {

                // Slash ke baad ka number nikaalo
                $parts = explode('/', $lastReg);
                $number = isset($parts[1]) ? (int)$parts[1] : 1000;

                $student->reg_no = $prefix . ($number + 1);
            } else {

                $student->reg_no = $prefix . '1001';
            }
        });
    }


}
