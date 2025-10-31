<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show($id)
    {
        // Exam ke saath saare linked questions nikal lo
        $exam = Exam::with(['questions', 'category'])->findOrFail($id);

        return view('exam.exam', compact('exam'));
    }
    public function submit($id)
    {
        $exam = Exam::findOrFail($id);

        // ✅ यहाँ आप student के answers save कर सकते हैं
        // अभी के लिए बस message दिखा देते हैं
        return view('exam.exam_result', compact('exam'));
    }
    public function saveAnswer(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question_id' => 'required|exists:questions,id',
        ]);
    
        StudentAnswer::updateOrCreate(
            [
                'student_id' => auth()->id(),
                'exam_id' => $request->exam_id,
                'question_id' => $request->question_id,
            ],
            [
                'answer' => $request->answer,
                'is_attempted' => $request->answer ? 1 : 0,
            ]
        );
    
        return response()->json(['success' => true]);
    }
    

  
}
