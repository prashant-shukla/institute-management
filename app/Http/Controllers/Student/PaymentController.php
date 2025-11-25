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
        $student = $user->student;

        $payments = collect();
        $totalPaid = 0;
        $totalFee = 0;
        $balance  = 0;

        if ($student) {
            // assume relation: $student->feeReceipts()
            $payments = $student->feeReceipts()->orderByDesc('created_at')->get();

            $totalPaid = $payments->sum('fee_amount');
            $totalFee  = $student->total_fee ?? 0;
            $balance   = max($totalFee - $totalPaid, 0);
        }

        return view('student.payments.index', [
            'payments'  => $payments,
            'totalPaid' => $totalPaid,
            'totalFee'  => $totalFee,
            'balance'   => $balance,
        ]);
    }

public function downloadPaymentsPdf()
{
    $user = Auth::user();
    $student = $user->student;   // student relation

    if (! $student) {
        abort(404, 'Student not found');
    }

    // 👇 Student ka full name yahin bana lo
    $fullName = trim(($student->first_name ?? '') . ' ' . ($student->last_name ?? ''));

    // student_fees table se data lo
    $payments = StudentFees::where('student_id', $student->id)
        ->orderBy('created_at')
        ->get();

    // Total fee / paid / balance
    $totalFee  = $student->course_fee ?? $student->total_fee ?? 0;
    $totalPaid = $payments->sum('fee_amount');
    $balance   = max($totalFee - $totalPaid, 0);

    // PDF view ko fullName pass karo
    $pdf = Pdf::loadView('student.payments.payments-pdf', [
        'student'   => $student,
        'fullName'  => $fullName,     // 👈 YAHAN SE SEND HO RAHA HAI
        'payments'  => $payments,
        'totalFee'  => $totalFee,
        'totalPaid' => $totalPaid,
        'balance'   => $balance,
    ]);

    $fileName = 'payment-history-'.$student->id.'.pdf';

    return $pdf->download($fileName);
}



}
