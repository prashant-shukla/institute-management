<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
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
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
