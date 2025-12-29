<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Feedback;
use App\Models\StudentsFeedback;
use App\Models\StudentFees;


class DashboardController extends Controller
{
public function index(Request $request)
{
    $user = Auth::user();
    $student = $user?->student;

    // ✅ Student ke ALL enrolled courses
    $myCourses = collect();

    if ($student) {
        $myCourses = \App\Models\StudentFees::with('course')
            ->where('student_id', $student->id)
        //    ->where('status', 'paid') // optional
            ->orderBy('id', 'desc')
            ->get();
    }

    // ----------------------------
    // FILTER LOGIC (All Courses)
    // ----------------------------
    $filter = $request->get('category'); // online / offline / certifications

    $query = \App\Models\Course::where('status', 'active');

    if ($filter === 'online') {
        $query->whereIn('mode', ['online', 'both']);
    }
    elseif ($filter === 'offline') {
        $query->whereIn('mode', ['offline', 'both']);
    }
    elseif ($filter === 'certifications') {
        $query->where('course_categories_id', 3);
    }

    $allCourses = $query->orderBy('id', 'desc')->get();

    return view('student.dashboard', compact(
        'myCourses',
        'allCourses',
        'filter'
    ));
}

// Example controller method
public function feedbackForm()
{
    $questions = [
        1 => 'Counsellor explained complete course details, duration and training methodology.',
        2 => 'I have received a copy of the Cadadda day-wise schedule and Student ID.',
        3 => 'My trainer has a good knowledge of the course subject.',
        4 => 'My faculty training skills are effective.',
        5 => 'My trainer is helpful and provides good assistance in lab.',
        6 => 'Computers were always in working condition.',
        7 => 'The course materials provided to me are relevant and useful.',
        8 => 'There are adequate welfare facilities (water / toilet / waiting area etc.).',
        9 => 'Audio-visual (LED / Projector) were efficiently used in training.',
        10 => 'Overall I am satisfied with Cadadda centre.',
        11 => 'I will progress to the next higher level software with Cadadda.',
    ];

    return view('student.feedback', compact('questions'));
}


public function store(Request $request)
{
    $request->validate([
        'q1' => 'required',
        'q2' => 'required',
        'q3' => 'required',
        'q4' => 'required',
        'q5' => 'required',
        'q6' => 'required',
        'q7' => 'required',
        'q8' => 'required',
        'q9' => 'required',
        'q10' => 'required',
        'q11' => 'required',
        'comments' => 'nullable|string',
    ]);
  
    $studentId = Auth::id();

    // If you use a custom guard named 'student'
    if (! $studentId && Auth::guard('student')->check()) {
        $studentId = Auth::guard('student')->id();
    }

    // Fallback: accept student_id from form (only if present and validated)
    if (! $studentId && $request->filled('student_id')) {
        $studentId = $request->input('student_id');
    }

    if (! $studentId) {
        return back()->withErrors(['student' => 'Student not authenticated. Please login first.']);
    }

    StudentsFeedback::create([
        'student_id' => $studentId,   // logged-in student ID
        'q1' => $request->q1,
        'q2' => $request->q2,
        'q3' => $request->q3,
        'q4' => $request->q4,
        'q5' => $request->q5,
        'q6' => $request->q6,
        'q7' => $request->q7,
        'q8' => $request->q8,
        'q9' => $request->q9,
        'q10' => $request->q10,
        'q11' => $request->q11,
        'comments' => $request->comments,
    ]);

    return back()->with('success', 'Feedback submitted successfully!');
}


}
