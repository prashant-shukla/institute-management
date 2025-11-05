<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ExamController extends Controller
{
    public function show($id)
    {
        $exam = Exam::with(['questions', 'category'])->findOrFail($id);
        return view('exam.exam', compact('exam'));
    }

    public function saveAnswer(Request $request)
    {
        try {
            $request->validate([
                'exam_id' => 'required|integer',
                'question_id' => 'required|integer',
                'answer' => 'nullable|string|max:5',
            ]);

            $userId = auth()->id();

            StudentAnswer::updateOrCreate(
                [
                    'user_id' => $userId,
                    'exam_id' => $request->exam_id,
                    'question_id' => $request->question_id,
                ],
                ['answer' => $request->answer]
            );

            return response()->json(['success' => true, 'message' => 'Answer saved successfully']);
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
}
