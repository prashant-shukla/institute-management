<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Course;
use App\Models\StudentCourse;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function afterCreate(): void
    {
        $student = $this->record;     // 🔥 newly created student
        $data    = $this->data;       // 🔥 form data

        // Safety check
        if (empty($data['course_id'])) {
            return;
        }

        $course = Course::find($data['course_id']);

        if (! $course) {
            return;
        }

        // GST calculation
        $courseFee = $data['course_fee'] ?? $course->offer_fee;
        $calculateGst = $data['calculate_gst'] ?? false;

        $gstAmount = $calculateGst ? ($courseFee * 0.18) : 0;
        $totalFee  = $courseFee + $gstAmount;

        // ✅ AUTO ENTRY IN student_courses
        StudentCourse::create([
            'student_id'  => $student->id,
            'course_id'   => $course->id,
            'course_fee'  => $courseFee,
            'gst_amount'  => $gstAmount,
            'total_fee'   => $totalFee,
            'mode'        => $student->is_online ? 'online' : 'offline',
            'status'      => 'active',
            'enrolled_at' => now(),
        ]);
    }

}

