<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Reviews;
use App\Models\Student;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function Home()
    {
        $reviews = Reviews::all();
        $reviews = Reviews::with('student')->get();
        $mentors = Mentor::all(); 
        $courses = Course::all();
        $coursecategories = CourseCategory::all();

        return view('Home', [
            'reviews' => $reviews,
            'mentors' => $mentors,
            'coursecategories'=>$coursecategories,
            'courses' => $courses,
        ]); 
    }
   
}
