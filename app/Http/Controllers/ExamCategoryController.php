<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamCategory;

class ExamCategoryController extends Controller
{
    /**
     * Display a listing of the exam categories (frontend).
     */
    public function index()
    {
        $categories = ExamCategory::where('status', 1)->latest()->get();

        return view('exam', compact('categories'));
    }

    /**
     * Display the specified category and its related exams.
     */
    public function show($id)
    {
        $category = ExamCategory::with('exams')->findOrFail($id);

        return view('exam_detail', compact('category'));
    }
}
