<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

}
