<?php

namespace App\Http\Controllers;


use App\Models\Exam;
use App\Models\User;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class ExamController extends Controller
{
    public function show($id)
    {
        $exam = Exam::with(['questions', 'category'])->findOrFail($id);
        $student = Auth::user(); // ✅ uses default 'web' guard

        if (!$student) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return view('exam.exam', compact('exam', 'student'));
    }

    public function saveAnswer(Request $request)
    {
        try {
            $request->validate([
                'exam_id' => 'required|integer',
                'question_id' => 'required|integer',
                'answer' => 'nullable|string|max:5',
                'student_id' => 'required|integer', // ensure it's passed
            ]);

            StudentAnswer::updateOrCreate(
                [
                    'student_id' => $request->student_id, // ✅ fixed
                    'exam_id' => $request->exam_id,
                    'question_id' => $request->question_id,
                ],
                ['answer' => $request->answer]
            );

            return response()->json([
                'success' => true,
                'message' => 'Answer saved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }


    public function submit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exam.exam_result', compact('exam'));
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
        return view('exam.exam_result', compact('exam', 'user', 'answers', 'result'));
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

        return view('exam.exam_summary', compact('user', 'summaries'));
    }
}
