<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamCategory;
use App\Models\Exam;   // 👈 exam model

class ExamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = $user->student;

        $exams = collect();

        if ($student && $student->course) {
            $courseName = $student->course->name;

            if (! empty($courseName)) {
                $category = ExamCategory::where('name', $courseName)->first();

                if ($category && method_exists($category, 'exams')) {
                    // simple: sab exams of that category
                    $exams = $category->exams()->get();
                }
            }
        }

        return view('student.exams.index', [
            'exams' => $exams,
        ]);
    }

    // ✅ Start exam from student side
    public function start(Exam $exam)
    {
        $user = Auth::user();
        $student = $user->student;

        // Optional: security check – kya ye exam student ke course ke category me hai?
        if ($student && $student->course) {
            $courseName = $student->course->name;

            $category = $exam->category ?? null; // assume relation $exam->category

            if (! $category || $category->name !== $courseName) {
                abort(403, 'You are not allowed to access this exam.');
            }
        }

        // Yahan se tum apne existing exam engine pe redirect kar sakte ho,
        // ya direct exam start page dikha sakte ho.
        // Agar already koi route hai jaise `exam.start`, to wahan redirect:
        //
        // return redirect()->route('exam.start', $exam->id);

        // Simple placeholder: student side exam intro page
        return view('student.exams.start', [
            'exam' => $exam,
        ]);
    }
}
