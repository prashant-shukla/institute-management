<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Mentor;
use App\Models\Events;
use App\Models\Reviews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function main()
    {
        $mentors = Mentor::all(); 
        $courses = Course::all();
        $events = Events::all();
        $reviews = Reviews::all();
        $reviews = Reviews::with('student')->get();
        //dd($reviews);
        return view('main', ['mentors' => $mentors,'courses' => $courses,'events'=>$events,'reviews'=>$reviews]); 
    }
    public function courses()
    {
        $courses = Course::all();
        dd($courses); // For debugging, remove this line in production
        return view('courses', ['courses' => $courses]);
    }
}
