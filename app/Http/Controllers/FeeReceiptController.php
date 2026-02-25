<?php

namespace App\Http\Controllers;

use App\Models\StudentFees;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\Http;

class FeeReceiptController extends Controller
{
    public function print($id)
    {
        $fee = \App\Models\StudentFees::with([
            'student.user',
            'course'
        ])->findOrFail($id);
    
        return view('receipts.fee', compact('fee'));
    }
 

public function show($id)
{
    $student = Student::with('feeReceipts')->findOrFail($id);

    return view('students.receipt', compact('student'));
}
    public function sendWhatsAppMessage($record)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_CAMPAIGN_KEY',
            'Content-Type' => 'application/json',
        ])->post('https://backend.aisensy.com/campaign/t1/api/v2', [
            "apiKey" => "YOUR_CAMPAIGN_KEY",
            "campaignName" => "fee_confirmation",
            "destination" => $record->student->mobile_no,
            "userName" => $record->student->name,
            "templateParams" => [
                $record->fee_amount,
                $record->course->name,
            ],
        ]);

        return $response->json();
    }
}
