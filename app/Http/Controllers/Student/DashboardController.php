<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

public function index()
{
    $user = Auth::user();
    $student = $user?->student;

    $courses = collect();

    if ($student && $student->course) {
        $courses = collect([$student->course]);
    }

    // Student ke course ki fees
    $courseFee = $student?->course_fee ?? 0;
    $totalFee  = $student?->total_fee ?? $courseFee;

    // Student ka total paid amount
    $totalPaid = $student?->feeReceipts()->sum('fee_amount') ?? 0;

    // Balance due
    $balance = max($totalFee - $totalPaid, 0);

    // Last Payment record
    $lastPayment = $student?->feeReceipts()->latest()->first();

    // Last payment date (null safe)
    $lastPaymentDate = optional($lastPayment?->created_at)->format('Y/m/d');

    return view('student.dashboard', [
        'courses'          => $courses,
        'courseFee'        => $courseFee,
        'totalFee'         => $totalFee,
        'totalPaid'        => $totalPaid,
        'balance'          => $balance,
        'lastPaymentDate'  => $lastPaymentDate,
    ]);
}


}
