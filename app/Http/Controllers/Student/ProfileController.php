<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $student = $user?->student;

    if (! $student) {
        abort(404, 'Student profile not found.');
    }

    /**
     * ============================
     * FEES / COURSES SUMMARY
     * ============================
     */

    // 🔥 All fee records (multiple courses + payments)
    $fees = $student->student_fees()
        ->with('course')   // eager load course
        ->latest()
        ->get();

    // 🔥 All enrolled courses (unique)
    $courses = $fees
        ->pluck('course')
        ->filter()               // null safety
        ->unique('id')
        ->values();

    // 🔥 Total course fee (sum of all courses)
    $totalFee = $fees->sum('fee_amount');

    // 🔥 Total paid amount (NO status column)
    $totalPaid = $fees->sum('fee_amount');

    // 🔥 Balance
    $balance = max($totalFee - $totalPaid, 0);

    /**
     * ============================
     * ATTENDANCE SUMMARY
     * ============================
     */

    $totalSessions = $student->attendances()->count();

    $presentCount = $student->attendances()
        ->where('status', 'present')
        ->count();

    $attendancePercent = $totalSessions > 0
        ? round(($presentCount / $totalSessions) * 100, 1)
        : 0;

    /**
     * ============================
     * VIEW
     * ============================
     */

    return view('student.profile', [
        'user'              => $user,
        'student'           => $student,
        'courses'           => $courses,   // ✅ multiple courses
        'fees'              => $fees,      // ✅ all payments
        'totalFee'          => $totalFee,
        'totalPaid'         => $totalPaid,
        'balance'           => $balance,
        'totalSessions'     => $totalSessions,
        'presentCount'      => $presentCount,
        'attendancePercent' => $attendancePercent,
    ]);
}

}
