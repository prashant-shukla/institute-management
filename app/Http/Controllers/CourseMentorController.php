<?php

namespace App\Http\Controllers;

use App\Models\CourseMentor;
use Illuminate\Http\Request;

class CourseMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all course mentors
        $courseMentors = CourseMentor::all();

        // Return a view with the course mentors data
        return view('course_mentors.index', compact('courseMentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return a view to create a new course mentor
        return view('course_mentors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // Validation rules here
        ]);

        // Create a new course mentor instance and store it
        CourseMentor::create($request->all());

        // Redirect back with a success message
        return redirect()->route('course_mentors.index')
                         ->with('success', 'Course mentor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseMentor  $courseMentor
     * @return \Illuminate\Http\Response
     */
    public function show(CourseMentor $courseMentor)
    {
        // Return a view with the details of a specific course mentor
        return view('course_mentors.show', compact('courseMentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseMentor  $courseMentor
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseMentor $courseMentor)
    {
        // Return a view to edit the details of a specific course mentor
        return view('course_mentors.edit', compact('courseMentor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMentor  $courseMentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseMentor $courseMentor)
    {
        // Validate the incoming request data
        $request->validate([
            // Validation rules here
        ]);

        // Update the course mentor instance with the new data
        $courseMentor->update($request->all());

        // Redirect back with a success message
        return redirect()->route('course_mentors.index')
                         ->with('success', 'Course mentor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMentor  $courseMentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseMentor $courseMentor)
    {
        // Delete the specified course mentor
        $courseMentor->delete();

        // Redirect back with a success message
        return redirect()->route('course_mentors.index')
                         ->with('success', 'Course mentor deleted successfully.');
    }
}
