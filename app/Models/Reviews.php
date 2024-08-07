<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'student_id',
        'review',
        'status',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
