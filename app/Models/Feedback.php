<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
     'reg_no',
     'name',
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

 // public function updatedStudentId($value)
 // {
 //     $student = Student::find($value);
 //     $this->reg_no = $student ? $student->reg_no : '';
 // }
 public function updatedStudentId($value)
 {
     $student = Student::find($value);
     $this->form->fill(['reg_no' => $student ? $student->reg_no : '']);
 }
}
