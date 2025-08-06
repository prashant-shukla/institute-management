<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Menu;
use App\Models\Mentor;
use App\Models\Reviews;
use App\Models\Student;
use App\Models\CourseSyllabuses;
use App\Models\CourseTool;
use App\Models\CourseMentor;
use App\Models\Banner;
use App\Models\Events;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use Datlechin\FilamentMenuBuilder\Models\Menu as DatlechinMenu;


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

        $menu = null;

        if (Schema::hasTable('menu_locations')) {
            $menu = Menu::whereHas('locations', function ($query) {
                $query->where('location', 'primary');
            })->first();
        }

        $menu = DatlechinMenu::location('primary');
        // dd($menu);

        $reviews = Reviews::all();
        $mentors = Mentor::all();
        $courses = Course::all();
        $coursecategories = CourseCategory::all();
        $banners = Banner::where('banner_page', 'home')->get();
        return view('home', [
            'reviews' => $reviews,
            'mentors' => $mentors,
            'coursecategories' => $coursecategories,
            'courses' => $courses,
            'banners' => $banners,
        ]);
    }
    public function category()
    {
        $courses = Course::all();
        $coursecategories = CourseCategory::all();
        $mentors = Mentor::all();
        $reviews = Reviews::all();
        $banners = Banner::where('banner_page', 'categories')->get();
        return view('category', ['courses' => $courses, 'coursecategories' => $coursecategories, 'mentors' => $mentors, 'reviews' => $reviews,   'banners' => $banners,]);
    }
    // In your controller
    public function filterCourses(Request $request)
    {
        $filter = $request->input('filter');
        $coursecategories = CourseCategory::all();
        // Assuming you have a relationship between courses and categories
        if ($filter === '*') {
            $courses = Course::all(); // Fetch all courses
        } else {
            $courses = Course::whereHas('coursecategory', function ($query) use ($filter) {
                $query->where('id', $filter);
            })->get();
        }
        $coursecategories = CourseCategory::all();
        $mentors = Mentor::all();
        $reviews = Reviews::all();
        return view('ajax', ['courses' => $courses, 'coursecategories' => $coursecategories, 'mentors' => $mentors, 'reviews' => $reviews])->render();
    }

    public function Course($slug, $id)
    {
        $slug = $slug;
        // Retrieve the specific course by its ID
        //   dd($id);
        $course = Course::where('id', $id)->firstOrFail();

        $banners = Banner::where('banner_page', 'course')->get();

        // Fetch related data specific to this course
        $coursementors = CourseMentor::where('course_id', $id)->get();
        $reviews = Reviews::where('course_id', $id)->get();
        $coursesyllabuses = CourseSyllabuses::where('course_id', $id)->get();
        $coursetool = CourseTool::where('course_id', $id)->get();
        //    dd($banners[0]->image_url[0]);

        // Pass the specific data to the view
        return view('course', [
            'course' => $course,  // Pass single course object
            'coursementors' => $coursementors,
            'reviews' => $reviews,
            'coursesyllabuses' => $coursesyllabuses,
            'coursetool' => $coursetool,
            'banners' => $banners,
        ]);
    }
    public function contact()
    {

        $banners = Banner::where('banner_page', 'contact us')->get();

        return view('contact', ['banners' => $banners,]);
    }
    public function about()
    {

        $banners = Banner::where('banner_page', 'about us')->get();
        $mentors = Mentor::all();
        $history = History::all();

        return view('aboutUs', ['banners' => $banners, 'mentors' => $mentors, 'history' => $history]);
    }
    public function event()
    {

        $banners = Banner::where('banner_page', 'event')->get();
        $events = Events::all();
        return view('event', ['banners' => $banners, 'events' => $events,]);
    }
}
