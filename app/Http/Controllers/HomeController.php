<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Reviews;
use App\Models\Student;
use App\Models\CourseSyllabuses;
use App\Models\CourseTool;
use App\Models\CourseMentor;
use Illuminate\Support\Str;

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

        return view('home', [
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

  public function Course( $id)
  {
      // Retrieve the specific course by its ID
    //   dd($slug, $id);
      $course = Course::where('id', $id)->firstOrFail();
  
     
  
      // Fetch related data specific to this course
      $coursementors = CourseMentor::where('course_id', $id)->get();
      $reviews = Reviews::get()->all();
      $coursesyllabuses = CourseSyllabuses::where('course_id', $id)->get();
      $coursetool = CourseTool::where('course_id', $id)->get();
  
      // Pass the specific data to the view
      return view('course', [
          'course' => $course,  // Pass single course object
          'coursementors' => $coursementors,
          'reviews' => $reviews,
          'coursesyllabuses' => $coursesyllabuses,
          'coursetool' => $coursetool,
      ]);
  }
  
}
