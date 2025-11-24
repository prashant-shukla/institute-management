<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LiveClass;

class LiveClassController extends Controller
{
public function index()
{
    $user    = Auth::user();
    $student = $user?->student;

    // Agar student ya course hi nahi mila → empty list, koi error nahi
    if (! $student || ! $student->course_id) {
        $liveClasses = collect();   // empty collection
        return view('student.live.index', compact('liveClasses'));
    }

    // Student ke course ke hisaab se live classes fetch
    $liveClasses = LiveClass::where('course_id', $student->course_id)
        ->where('status', 1)
        ->orderBy('start_time')
        ->get();

    return view('student.live.index', compact('liveClasses'));
}
}
