<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
