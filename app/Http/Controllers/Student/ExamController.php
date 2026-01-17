<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamCategory;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use App\Models\Exam;   // 👈 exam model

class ExamController extends Controller
{
public function index()
{
    $user = auth()->user();
    $student = $user->student;

    if (! $student) {
        return redirect()->back()->with('error', 'Student not found');
    }

    // 🔹 Student purchased exams
    $purchasedExamIds = \App\Models\StudentExam::where('student_id', $student->id)
        ->pluck('exam_id');

    // 🔹 Purchased exams (top section)
    $purchasedExams = \App\Models\Exam::with('category')
        ->whereIn('id', $purchasedExamIds)
        ->get();

    // 🔹 All exams grouped by category
    $allExams = \App\Models\Exam::with('category')
        ->get()
        ->groupBy('category.name');

    return view('student.exams.index', [
        'purchasedExams' => $purchasedExams,
        'allExams'       => $allExams,
    ]);
}



    public function show($id)
    {
        $exam = Exam::with(['questions', 'category'])->findOrFail($id);
        $student = Auth::user(); // ✅ uses default 'web' guard

        if (!$student) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return view('student.exams.exam', compact('exam', 'student'));
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


    public function submit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('student.exams.exam_result', compact('exam'));
    }

    public function showResult($examId)
    {
        // Exam + questions load
        $exam = Exam::with('questions')->findOrFail($examId);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view your exam result.');
        }

        $studentId = $user->id;

        // Get all student answers for this exam
        $answers = StudentAnswer::where('exam_id', $examId)
            ->where('student_id', $studentId)
            ->get();

        $totalQuestions = $exam->questions->count();
        $attempted = $answers->count();

        $correct = 0;
        $wrong = 0;

        foreach ($answers as $ans) {
            $question = $exam->questions->firstWhere('id', $ans->question_id);
            if ($question) {
                if (strtoupper(trim($ans->answer)) === strtoupper(trim($question->correct_option))) {
                    $correct++;
                    // Optional: Update student_answers table
                    $ans->is_correct = 1;
                } else {
                    $wrong++;
                    $ans->is_correct = 0;
                }
                $ans->save();
            }
        }

        $percentage = $totalQuestions > 0 ? round(($correct / $totalQuestions) * 100, 2) : 0;

        $result = [
            'total_questions' => $totalQuestions,
            'attempted' => $attempted,
            'correct' => $correct,
            'wrong' => $wrong,
            'percentage' => $percentage,
        ];
        return view('student.exams.exam_result', compact('exam', 'user', 'answers', 'result'));
    }

    public function examHistory()
    {
        $user = Auth::user();

        // user ne jin exams me answer diye hain unke exam IDs lo
        $examIds = StudentAnswer::where('student_id', $user->id)
            ->pluck('exam_id')
            ->unique();

        // exams ke saath questions aur user ke answers load karo
        $exams = Exam::with([
            'questions',
            'studentAnswers' => function ($q) use ($user) {
                $q->where('student_id', $user->id);
            }
        ])->whereIn('id', $examIds)->get();

        // result summary array banao
        $summaries = $exams->map(function ($exam) {
            $answers = $exam->studentAnswers;
            $total = $exam->questions->count();
            $attempted = $answers->count();
            $correct = $answers->where('is_correct', 1)->count();
            $wrong = $attempted - $correct;
            $percentage = $total > 0 ? round(($correct / $total) * 100, 2) : 0;

            return [
                'exam' => $exam,
                'total' => $total,
                'attempted' => $attempted,
                'correct' => $correct,
                'wrong' => $wrong,
                'percentage' => $percentage,
                'date' => optional($answers->min('created_at'))->format('Y-m-d H:i:s'),
            ];
        });

        return view('student.exams.exam_summary', compact('user', 'summaries'));
    }
}
