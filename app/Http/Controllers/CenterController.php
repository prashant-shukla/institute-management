<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCentersRequest;
use App\Http\Requests\UpdateCentersRequest;
use App\Models\Center;

class CentersController extends Controller
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
    public function store(StoreCentersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Center $centers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Center $centers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCentersRequest $request, Center $centers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $centers)
    {
        //
    }
}
