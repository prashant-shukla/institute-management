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
use App\Models\Post;
use App\Models\Blog;
use App\Models\Events;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\ProudStudent;
use App\Models\History;
use App\Models\Setting;
use App\Models\Video;
use App\Models\Feature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use App\Models\Testimonial;
use App\Models\Category;
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


    public function Homes()
    {
        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->get();

        // Latest 3 Active Courses
        $latestCourses = Course::active()
            ->latest()
            ->take(3)
            ->get();

        // Offline Courses
        $offlineCourses = Course::active()
            ->whereIn('mode', ['offline', 'both'])
            ->latest()
            ->take(4)
            ->get();

        // Online + Both (Only Active)
        $onlineCourses = Course::active()
            ->whereIn('mode', ['online', 'both'])
            ->latest()
            ->take(4)
            ->get();


        $proudStudents = ProudStudent::latest()
            ->take(3)
            ->get();

        $videos = Video::latest()
            ->take(3)
            ->get();

        $clients = Client::latest()
            ->limit(6)
            ->get();

        // Single query instead of 2
        $featuresUrl = Feature::value('button_url');


        $reviews = Reviews::with(['student', 'course'])
            ->where('status', 1)
            ->latest()
            ->limit(6)
            ->get();

        $latestBlogs = Post::latest()
            ->take(3)
            ->get();

        return view('homes', compact(
            'offlineCourses',
            'onlineCourses',
            'featuresUrl',
            'latestCourses',
            'testimonials',
            'proudStudents',
            'clients',
            'latestBlogs',
            'reviews',
            'videos'
        ));
    }




    public function Courses()
    {
        $courses = Course::where('status', 'active')
            ->orderByRaw("FIELD(mode, 'online', 'offline','both')")
            ->get();

        $clients = Client::latest()->get();

        $proudStudents = ProudStudent::all();

        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->get();

        $offlineCourses = $courses->whereIn('mode', ['offline', 'both']);
        $onlineCourses = $courses->whereIn('mode', ['online', 'both']);
        $certifications = $courses; // already filtered active

        return view('courses', compact(
            'offlineCourses',
            'onlineCourses',
            'certifications',
            'clients',
            'testimonials',
            'proudStudents'
        ));
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
        $galleries = Gallery::all(); // DB se sab galleries fetch
        return view('Gallery', compact('galleries')); // variable view me pass karo
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

        $query = Course::active();

        if ($filter !== '*') {
            $query->whereHas(
                'courseCategory',
                fn($q) =>
                $q->where('id', $filter)
            );
        }

        $courses = $query->get();

        return view('ajax', [
            'courses'          => $courses,
            'coursecategories' => CourseCategory::all(),
            'mentors'          => Mentor::all(),
            'reviews'          => Reviews::where('status', 1)->get(),
        ])->render();
    }


    public function Course($slug, $id)
    {
        // Only Active Course
        $course = Course::where('id', $id)
            ->where('status', 'active') // 👈 Only Active
            ->firstOrFail();

        $banners = Banner::where('banner_page', 'course')->get();

        $coursementors = CourseMentor::where('course_id', $id)->get();

        $reviews = Reviews::where('course_id', $id)
            ->where('status', 1) // optional but recommended
            ->get();

        $coursesyllabuses = CourseSyllabuses::where('course_id', $id)->get();

        $totals = [];

        foreach ($coursesyllabuses as $syllabus) {
            $extraInfo = $syllabus->extra_info;

            if (is_string($extraInfo)) {
                $extraInfo = json_decode($extraInfo, true) ?? [];
            }

            if (!is_array($extraInfo)) {
                continue;
            }

            foreach ($extraInfo as $item) {

                if (is_object($item)) {
                    $item = (array) $item;
                }

                if (!isset($item['name'], $item['value'])) {
                    continue;
                }

                $name = $item['name'];
                $value = (int) $item['value'];

                $totals[$name] = ($totals[$name] ?? 0) + $value;
            }
        }

        $defaults = ['Video' => 0, 'Assignments' => 0, 'Projects' => 0, 'Tools' => 0];
        $totals = array_merge($defaults, $totals);

        $coursetool = CourseTool::where('course_id', $id)->get();

        $faqs = [];

        if (!empty($course->faqs)) {
            $faqs = is_array($course->faqs)
                ? $course->faqs
                : json_decode($course->faqs, true);

            if (!is_array($faqs)) {
                $faqs = [];
            }
        }

        return view('Course_Detail', compact(
            'course',
            'coursementors',
            'reviews',
            'coursesyllabuses',
            'coursetool',
            'banners',
            'faqs',
            'totals'
        ));
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
    public function blog()
    {
        $blogs = Post::with('category')->latest()->get();
        $categories = Category::all();
        return view('blog', compact('blogs', 'categories'));
    }
    public function show($slug)
    {
        $blog = Post::with(['category'])->where('slug', $slug)->firstOrFail();
        return view('blog_detail', compact('blog'));
    }

    public function verify($reg_no)
    {
        $reg_no = urldecode($reg_no);

        $student = Student::where('reg_no', $reg_no)
            ->with(['course', 'user'])
            ->firstOrFail();

        return view('student.verify', compact('student'));
    }
}
