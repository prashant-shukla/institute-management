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
    $user = Auth::user();
    $student = $user?->student;

    $payments   = collect();
    $examFees   = collect();
    $totalFee   = 0;
    $totalPaid  = 0;
    $balance    = 0;

    if ($student) {

        /* =============================
           COURSE PAYMENTS
        ============================= */
        $payments = $student->student_fees()
            ->orderByDesc('created_at')
            ->get();

        $courseTotal = $payments->sum('fee_amount');

        /* =============================
           EXAM PAYMENTS
        ============================= */
        $examFees = \App\Models\StudentExam::where('student_id', $student->id)
            ->get();

        $examTotal = $examFees->sum('total_fee');

        /* =============================
           FINAL TOTALS
        ============================= */
        $totalFee  = $courseTotal + $examTotal;
        $totalPaid = $totalFee; // because fully paid
        $balance   = 0;
    }

    return view('student.payments.index', compact(
        'payments',
        'examFees',
        'totalPaid',
        'totalFee',
        'balance'
    ));
}




// public function downloadPaymentsPdf()
// {
//     $user = Auth::user();
//     $student = $user?->student;

//     if (! $student) {
//         abort(404, 'Student not found');
//     }

//     // ✅ Full name from USER table
//     $fullName = trim($user->firstname . ' ' . $user->lastname);

//     // ✅ student_fees table se data
//     $payments = StudentFees::where('student_id', $student->id)
//         ->with('course')                 // optional (course name in PDF)
//         ->orderBy('created_at', 'asc')
//         ->get();

//     // ✅ Totals (NEW STRUCTURE)
//     $totalFee  = $payments->sum('total_amount');
//     $totalPaid = $payments->sum('fee_amount');
//     $balance   = max($totalFee - $totalPaid, 0);

//     // ✅ Generate PDF
//     $pdf = Pdf::loadView('student.payments.payments-pdf', [
//         'student'   => $student,
//         'user'      => $user,
//         'fullName'  => $fullName,
//         'payments'  => $payments,
//         'totalFee'  => $totalFee,
//         'totalPaid' => $totalPaid,
//         'balance'   => $balance,
//     ]);

//     $fileName = 'payment-history-student-'.$student->id.'.pdf';

//     return $pdf->download($fileName);
// }

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
