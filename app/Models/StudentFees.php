<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\Student;

class StudentFees extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
 


    protected $fillable = [
        'student_id',
        'course_id',
        'fee_amount',
        'gst_amount',
        'coupon_code',
        'discount_amount',
        'payment_mode',
        'remark',
        'received_on',
        'receipt_no',
    ];

    protected static function booted()
    {
        static::creating(function ($fee) {
            if (empty($fee->receipt_no)) {
                $lastId = self::max('id') ?? 0;
                $nextNumber = 1000 + $lastId + 1; // start from 1001
                $fee->receipt_no = 'CA1002/' . $nextNumber;
            }
        });
    }


  
}
