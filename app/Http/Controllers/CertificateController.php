<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);
        $student = Student::find($certificate->student_id);
        $course = Course::find($certificate->course_id);

        return view('certificate.show', compact('certificate', 'student', 'course'));
    }
}
