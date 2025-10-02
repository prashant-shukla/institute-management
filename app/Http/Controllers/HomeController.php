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
use App\Models\Client;
use App\Models\ProudStudent;
use App\Models\History;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use App\Models\Testimonial;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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


        return view('home');
    }
    public function Homes()
    {
        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $latestCourses = Course::orderBy('created_at', 'desc')->take(3)->get();
        $courses = Course::orderByRaw("FIELD(mode, 'online', 'offline')")->get();
        $proudStudents = ProudStudent::latest()->take(3)->get();

        $clients = Client::orderBy('created_at', 'desc')->limit(6)->get();
        return view('homes', [
            'courses' => $courses,
            'latestCourses' => $latestCourses,
            'testimonials' => $testimonials,
            'proudStudents' => $proudStudents,
            'clients' => $clients,
        ]);
    }
    public function Courses()
    {
        $courses = Course::orderByRaw("FIELD(mode, 'online', 'offline','both')")->get();
        $clients = Client::latest()->get();
        $proudStudents = ProudStudent::all();
        $testimonials = Testimonial::where('status', 1)->latest()->get();
        $offlineCourses = $courses->whereIn('mode', ['offline', 'both']);
        $onlineCourses = $courses->whereIn('mode', ['online', 'both']);
        $certifications = $courses->whereIn('mode', ['online', 'offline', 'both']);


        return view('courses', compact('offlineCourses', 'onlineCourses', 'certifications', 'clients', 'testimonials', 'proudStudents'));
    }
    public function Course_Detail($id)
    {
        $course_syllabuses = CourseSyllabuses::where('course_id', $id)->get();

        return view('Course_Detail', compact('course_syllabuses'));
    }

    public function contacts()
    {
        // सभी settings को key => value के रूप में लाओ
        $setting = Setting::all()->pluck('value', 'key')->toArray();

        // dot keys को nested array में बदलना
        $nested = [];
        foreach ($setting as $k => $v) {
            Arr::set($nested, $k, $v);
        }
        dd($setting);
        // अब nested array को view में भेज दो
        return view('contacts', compact('nested'))->with('setting', $nested);
    }

    public function Events()
{
    $now = \Carbon\Carbon::now();
    $pastEvents = Events::where('end_date', '<', $now)
        ->orderBy('end_date', 'desc')
        ->get();

    $presentEvents = Events::where('start_date', '>=', $now)
        ->orderBy('start_date', 'asc')
        ->get();

    return view('Event', [
        'pastEvents' => $pastEvents,
        'presentEvents' => $presentEvents,
    ]);
}


    public function Gallery()
    {
        return view('Gallery');
    }
    public function placement()
    {
        return view('placement');
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

        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // dot keys को nested array में बदलना
        $nested = [];
        foreach ($settings as $k => $v) {
            Arr::set($nested, $k, $v);
        }
        // अब nested array को view में भेज दो
        return view('contacts', compact('nested'))->with('settings', $nested);
    }
    public function about()
    {

        // $banners = Banner::where('banner_page', 'about us')->get();
        // $mentors = Mentor::all();
        // $history = History::all();

        // return view('aboutUs', ['banners' => $banners, 'mentors' => $mentors, 'history' => $history]);
        return view('about');
    }
}
