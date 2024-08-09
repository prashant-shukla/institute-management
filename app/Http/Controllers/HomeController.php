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
    public function category()
    {
        $courses = Course::all();
        $coursecategories = CourseCategory::all();
        $mentors = Mentor::all();
        $reviews = Reviews::all();
        //  dd($courses); // For debugging, remove this line in production
        return view('category', ['courses' => $courses,'coursecategories'=>$coursecategories,'mentors' => $mentors,'reviews' => $reviews]);
    }
    // In your controller
  public function filterCourses(Request $request) {
    $filter = $request->input('filter');
    $coursecategories = CourseCategory::all();
    // Assuming you have a relationship between courses and categories
    if ($filter === '*') {
        $courses = Course::all(); // Fetch all courses
    } else {
        $courses = Course::whereHas('coursecategory', function($query) use ($filter) {
            $query->where('id', $filter);
        })->get();
    }
    $coursecategories = CourseCategory::all();
    $mentors = Mentor::all();
    $reviews = Reviews::all();
    return view('ajax', ['courses' => $courses,'coursecategories'=>$coursecategories,'mentors' => $mentors,'reviews' => $reviews])->render();
  }
  public function Course()
    {
        $courses = Course::all();
        
        $mentors = Mentor::all();
        $reviews = Reviews::all();
        //  dd($courses); // For debugging, remove this line in production
        return view('Course', ['courses' => $courses,'mentors' => $mentors,'reviews' => $reviews]);
    }
}
