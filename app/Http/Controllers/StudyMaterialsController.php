<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudy_materialsRequest;
use App\Http\Requests\UpdateStudy_materialsRequest;
use App\Models\Studymaterials;
use Illuminate\Support\Facades\Storage;
class StudyMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudy_materialsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Studymaterials $study_materials)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|string',
            'file' => 'required|file|mimes:doc,docx,pdf,mp3,wav,aac,ogg,mp4,avi,mkv|max:10240',
        ]);
    
        $filePath = $request->file('file')->store('study_materials', 'public');
    
        StudyMaterial::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file' => $request->input('file'),
            'file' => $filePath,
            'uploaded_by' => $request->input('uploaded_by'),
            'course_id' => $request->input('course_id'),
            'upload_date' => now(),
        ]);
    
        return redirect()->route('studymaterials.index')->with('success', 'Study material uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studymaterials $study_materials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudy_materialsRequest $request, Studymaterials $study_materials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studymaterials $study_materials)
    {
        //
    }
}
