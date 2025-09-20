<?php

namespace App\Http\Controllers;

use App\Models\StudentFees;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;

class FeeReceiptController extends Controller
{
    public function print($id)
    {
        $fee = StudentFees::with(['student', 'course'])->findOrFail($id);
       
        return view('receipts.fee', compact('fee'));
    }
 

public function show($id)
{
    $student = Student::with('feeReceipts')->findOrFail($id);

    return view('students.receipt', compact('student'));
}
}
