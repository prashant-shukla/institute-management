<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $student = $user?->student;

        if (! $student) {
            abort(404, 'Student profile not found.');
        }

        /*
    |--------------------------------------------------------------------------
    | COURSE PAYMENTS
    |--------------------------------------------------------------------------
    */
        $coursePayments = $student->student_fees()
            ->with('course')
            ->latest()
            ->get();

        $totalCourseFee = $coursePayments->sum('fee_amount');


        /*
    |--------------------------------------------------------------------------
    | EXAM PAYMENTS
    |--------------------------------------------------------------------------
    */
        $examPayments = \App\Models\StudentExam::where('student_id', $student->id)
            ->with('exam')
            ->latest()
            ->get();

        $totalExamFee = $examPayments->sum('total_fee');


        /*
    |--------------------------------------------------------------------------
    | FINAL TOTALS
    |--------------------------------------------------------------------------
    */
        $totalFee   = $totalCourseFee + $totalExamFee;
        $totalPaid  = $totalFee; // since fully paid
        $balance    = 0;


        /*
    |--------------------------------------------------------------------------
    | ATTENDANCE SUMMARY
    |--------------------------------------------------------------------------
    */
        $totalSessions = $student->attendances()->count();

        $presentCount = $student->attendances()
            ->where('status', 'present')
            ->count();

        $attendancePercent = $totalSessions > 0
            ? round(($presentCount / $totalSessions) * 100, 1)
            : 0;


        /*
    |--------------------------------------------------------------------------
    | RETURN VIEW
    |--------------------------------------------------------------------------
    */
        return view('student.profile', [
            'user'              => $user,
            'student'           => $student,

            // payments
            'coursePayments'    => $coursePayments,
            'examPayments'      => $examPayments,

            // totals
            'totalCourseFee'    => $totalCourseFee,
            'totalExamFee'      => $totalExamFee,
            'totalFee'          => $totalFee,
            'totalPaid'         => $totalPaid,
            'balance'           => $balance,

            // attendance
            'totalSessions'     => $totalSessions,
            'presentCount'      => $presentCount,
            'attendancePercent' => $attendancePercent,
        ]);
    }
}
