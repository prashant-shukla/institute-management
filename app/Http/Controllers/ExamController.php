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
    // exam और logged-in user लें
    $exam = Exam::with('questions')->findOrFail($examId);

    // आप जो guard use कर रहे हैं: अगर normal web user है तो auth()->user()
    $user = auth()->user();
    if (! $user) {
        return redirect()->route('login')->with('error', 'Please login to view your exam result.');
    }
    $studentId = $user->id;

    // यहाँ answers लीजिए और calculations कीजिये
    $answers = StudentAnswer::where('exam_id', $examId)
                ->where('student_id', $studentId)
                ->get();

    $totalQuestions = $exam->questions->count();
    $attempted = $answers->count();

    // अगर StudentAnswer में boolean column `is_correct` है:
    $correct = $answers->where('is_correct', 1)->count();
    $wrong = $attempted - $correct;
    $percentage = $totalQuestions > 0 ? round(($correct / $totalQuestions) * 100, 2) : 0;

    $result = [
        'total_questions' => $totalQuestions,
        'attempted' => $attempted,
        'correct' => $correct,
        'wrong' => $wrong,
        'percentage' => $percentage,
    ];

    // **pass $answers भी view को भेज रहे हैं** (this fixes your undefined variable)
    return view('exam.exam_result', compact('exam', 'user', 'answers', 'result'));
}

}
