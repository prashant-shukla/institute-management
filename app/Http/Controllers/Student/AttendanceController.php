<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAttendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            abort(404, 'Student profile not found.');
        }

        $today     = Carbon::today();
        $todayDate = $today->toDateString();      // e.g. 2025-11-19
        $dayName   = $today->format('l');         // Sunday / Monday / ...

        // Aaj ki attendance record
        $attendance = StudentAttendance::where('student_id', $student->id)
            ->whereDate('date', $todayDate)
            ->first();

        $hasAttendance    = $attendance !== null;
        $attendanceStatus = $attendance->status ?? null;  // 'present' only (is page se)

        return view('student.attendance.create', [
            'todayDate'        => $todayDate,
            'dayName'          => $dayName,
            'hasAttendance'    => $hasAttendance,
            'attendanceStatus' => $attendanceStatus,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'    => 'required|date',
            'status'  => 'required|in:present',   // 🔥 sirf present allow
            'remarks' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return back()->withErrors(['error' => 'Student profile not found.']);
        }

        $today = Carbon::today()->toDateString();

        // Sirf aaj ki hi attendance is page se allow karo
        if ($request->date !== $today) {
            return back()->withErrors(['error' => 'You can only mark attendance for today.']);
        }

        // Aaj ki existing attendance
        $existing = StudentAttendance::where('student_id', $student->id)
            ->whereDate('date', $today)
            ->first();

        // Agar pehle se present hai → kuch mat change karo
        if ($existing && $existing->status === 'present') {
            return back()->with('success', 'Attendance already marked as Present for today.');
        }

        // Agar record nahi hai → create as present
        // (Is page se absent kabhi save nahi kar rahe)
        StudentAttendance::updateOrCreate(
            [
                'student_id' => $student->id,
                'date'       => $today,
            ],
            [
                'status'  => 'present',
                'remarks' => $request->remarks,
            ]
        );

        return back()->with('success', 'Attendance marked as Present.');
    }
}
