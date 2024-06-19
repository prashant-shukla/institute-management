<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent_feesRequest;
use App\Http\Requests\UpdateStudent_feesRequest;
use App\Models\Student_fees;

class StudentFeesController extends Controller
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
    public function store(StoreStudent_feesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student_fees $student_fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student_fees $student_fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(UpdateStudent_feesRequest $request, Student_fees $student_fees)
   // {
        //
   // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'received_on' => 'nullable|date',
            'remark' => 'nullable|string|max:255',
        ]);
    
        $studentFee = StudentFee::find($id);
        $studentFee->received_on = $request->input('received_on') ?? now();
        $studentFee->remark = $request->input('remark') ?? '';
        $studentFee->updated_at = now();
    
        $studentFee->save();
    
        return redirect()->route('student_fees.index')->with('success', 'Record updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student_fees $student_fees)
    {
        //
    }
}
