<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentFees;   // ✅ ye wala
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
public function index()
{
    $user = auth()->user();
    $student = $user?->student;

    $coursePayments = collect();
    $examPayments   = collect();

    $totalCourseFee = 0;
    $totalExamFee   = 0;

    if ($student) {

        // ✅ Course Payments
        $coursePayments = $student->student_fees()
            ->orderByDesc('created_at')
            ->get();

        $totalCourseFee = $coursePayments->sum('fee_amount');

        // ✅ Exam Payments
        $examPayments = \App\Models\StudentExam::where('student_id', $student->id)
            ->orderByDesc('created_at')
            ->get();

        $totalExamFee = $examPayments->sum('total_fee');
    }

    return view('student.payments.index', [
        'coursePayments' => $coursePayments,
        'examPayments'   => $examPayments,
        'totalPaid'      => $totalCourseFee + $totalExamFee,
        'totalFee'       => $totalCourseFee + $totalExamFee,
        'balance'        => 0,
    ]);
}






public function downloadPaymentsPdf()
{
    $user = Auth::user();
    $student = $user?->student;

    if (! $student) {
        abort(404, 'Student not found');
    }
    $fullName = trim($user->firstname . ' ' . $user->lastname);

    // Student fees + course load
    $payments = StudentFees::where('student_id', $student->id)
        ->with('course') // 🔥 yahin se course milega
        ->orderBy('created_at')
        ->get();

    /**
     * TOTAL COURSE FEE
     * 👉 course_id se course.offer_fee
     */
    $totalFee = $payments->sum(function ($payment) {
        return $payment->course?->offer_fee ?? 0;
    });


    /**
     * TOTAL PAID
     */
    $totalPaid = $payments->sum('fee_amount');

    /**
     * BALANCE
     */
    $balance = max($totalFee - $totalPaid, 0);

    return Pdf::loadView('student.payments.payments-pdf', compact(
        'student',
        'payments',
        'totalFee',
        'totalPaid',
        'fullName',
        'balance'
    ))->download('payment-history-'.$student->id.'.pdf');
}

}
