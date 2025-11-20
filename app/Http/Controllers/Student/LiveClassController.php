<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LiveClass;

class LiveClassController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        // Student ke course ke hisaab se live classes fetch
        $liveClasses = LiveClass::where('course_id', $student->course_id ?? 0)
            ->where('status', 1)
            ->orderBy('start_time')
            ->get();

        return view('student.live.index', compact('liveClasses'));
    }
}
