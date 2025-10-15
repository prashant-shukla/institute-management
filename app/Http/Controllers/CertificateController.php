<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{


public function show($id)
{
    $certificate = Certificate::findOrFail($id);

    // Load student with related user and course
    $student = Student::with('user', 'course')->find($certificate->student_id);

    // Student full name
    $studentName = trim(($student->user->firstname ?? '') . ' ' . ($student->user->lastname ?? ''));

    // Get course
    $course = $student->course;

    // Get tool names by joining course_tools with tools table
    $tools = DB::table('course_tools')
        ->join('tools', 'course_tools.tool_id', '=', 'tools.id')
        ->where('course_tools.course_id', $course->id)
        ->orderBy('course_tools.sort', 'asc')
        ->pluck('tools.name');

    return view('certificate.show', [
        'certificate' => $certificate,
        'student' => $student,
        'course' => $course,
        'studentName' => $studentName,
        'tools' => $tools,
    ]);
}


}
