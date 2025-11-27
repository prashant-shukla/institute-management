<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class StudentCertificateController extends Controller
{

    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(404, 'Student not found');
        }
        // dd($student);

        return view('student.certificate.index', compact('student'));
    }

    public function download()
{
    $student = Auth::user()->student;

    if (! $student || $student->certificate_assigned != 1) {
        abort(403, 'Certificate not assigned yet.');
    }

    // Student full name
    $studentName = trim(($student->first_name ?? '') . ' ' . ($student->last_name ?? ''));

    // Course
    $course = $student->course;

    // Tools
    $tools = DB::table('course_tools')
        ->join('tools', 'course_tools.tool_id', '=', 'tools.id')
        ->where('course_tools.course_id', $course->id)
        ->orderBy('course_tools.sort', 'asc')
        ->pluck('tools.name');

    // Optional: certificate record
    $certificate = Certificate::where('student_id', $student->id)->first();

    $pdf = Pdf::loadView('student.certificate.pdf', [
        'studentName' => $studentName,
        'course'      => $course,
        'tools'       => $tools,
        'certificate' => $certificate,
    ]);

    return $pdf->setPaper('a4', 'landscape')->download('certificate-'.$student->id.'.pdf');
}

}
