<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            abort(404, 'Student profile not found.');
        }

        $course = $student->course;

        // Fees summary
        $courseFee = $student->course_fee ?? 0;
        $totalFee  = $student->total_fee ?? $courseFee;

        $totalPaid = $student->feeReceipts()->sum('fee_amount') ?? 0;
        $balance   = max($totalFee - $totalPaid, 0);

        // Attendance summary
        $totalSessions  = $student->attendances()->count() ?? 0;
        $presentCount   = $student->attendances()->where('status', 'present')->count() ?? 0;
        $attendancePercent = $totalSessions > 0
            ? round(($presentCount / $totalSessions) * 100, 1)
            : 0;
        return view('student.profile', [
            'user'              => $user,
            'student'           => $student,
            'course'            => $course,
            'courseFee'         => $courseFee,
            'totalFee'          => $totalFee,
            'totalPaid'         => $totalPaid,
            'balance'           => $balance,
            'totalSessions'     => $totalSessions,
            'presentCount'      => $presentCount,
            'attendancePercent' => $attendancePercent,
        ]);
    }
}
