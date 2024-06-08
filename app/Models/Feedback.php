<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class feedback extends Model
{
    use HasFactory;
       protected $fillable = [
        'reg_no',
        'student_id',
        'description',
    ];
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
