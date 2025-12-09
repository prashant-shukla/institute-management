<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class DashboardController extends Controller
{
public function index(Request $request)
{
    $user = Auth::user();
    $student = $user?->student;

    $currentCourse = $student?->course;

    $filter = $request->get('category'); // online / offline / certifications

    $query = \App\Models\Course::where('status', 'active');

    if ($filter === 'online') {
        $query->whereIn('mode', ['online', 'both']);
    }
    elseif ($filter === 'offline') {
        $query->whereIn('mode', ['offline', 'both']);
    }
    elseif ($filter === 'certifications') {
        // Certification category = 3 (example) 
        $query->where('course_categories_id', 3);
    }

    $allCourses = $query->orderBy('id', 'desc')->get();

    return view('student.dashboard', compact(
        'currentCourse',
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


}
