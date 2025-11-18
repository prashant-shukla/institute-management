<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        dd('sss');
        $student = Auth::guard('student')->user();

        return view('student.dashboard', [
            'courses' => $student->courses()->take(5)->get(),
        ]);
        
    }
}

