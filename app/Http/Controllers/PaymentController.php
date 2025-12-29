<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;      // ✅ THIS IS IMPORTANT
use App\Models\StudentFees;


class PaymentController extends Controller
{
    public function createOrder($course_id)
    {
        $course = Course::findOrFail($course_id);

        $amount = $course->offer_fee; // FINAL payable
        $original_fee = $course->fee; // Original fee
        $offer_fee = $course->offer_fee; // Discounted fee

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt'  => 'order_rcpt_' . $course_id,
            'amount'   => $amount * 100,
            'currency' => 'INR'
        ]);

        return view('payment', [
            'key'         => env('RAZORPAY_KEY'),
            'amount'      => $amount,
            'orderId'     => $order->id,
            'courseId'    => $course_id,
            'courseName'  => $course->name,
            'fees'        => $original_fee,
            'offer_fees'  => $offer_fee,
        ]);
    }



public function paymentSuccess(Request $request)
{
   
    // 1️⃣ Required Razorpay fields
    if (
        !$request->razorpay_payment_id ||
        !$request->razorpay_order_id ||
        !$request->razorpay_signature
    ) {
        return redirect()->back()->with('error', 'Payment Failed! Missing Razorpay data.');
    }

    // 2️⃣ Verify Razorpay signature
    if (!$this->verifySignature(
        $request->razorpay_order_id,
        $request->razorpay_payment_id,
        $request->razorpay_signature
    )) {
        return redirect()->back()->with('error', 'Payment Failed! Signature mismatch.');
    }

    // 3️⃣ Course & Amount (SECURE)
    $course = Course::findOrFail($request->course_id);
    $amount = $course->offer_fee ?? $course->fee;

    // 4️⃣ Save PAYMENT
    $payment = Payment::create([
        'user_id'            => auth()->id(),
        'course_id'          => $course->id,
        'gateway'            => 'razorpay',
        'gateway_payment_id' => $request->razorpay_payment_id,
        'amount'             => $amount,
        'currency'           => 'INR',
        'status'             => 'success',
        'meta'               => json_encode([
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_signature' => $request->razorpay_signature,
        ]),
    ]);

    if (!$payment || !$payment->id) {
        return redirect()->back()->with('error', 'Payment failed. Please contact support.');
    }

    // 5️⃣ Find STUDENT (linked with user + course)
$student = Student::where('user_id', auth()->id())
    ->first();


    if (!$student) {
        return redirect()->back()->with('error', 'Student record not found.');
    }

    // 6️⃣ SAVE INTO student_fees (NO DUPLICATE)
    \App\Models\StudentFees::firstOrCreate(
        [
            'student_id' => $student->id,
            'course_id'  => $course->id,
        ],
        [
            'fee_amount'   => $amount,
            'gst_amount'   => null, // or calculate if needed
            'payment_mode' => 'razorpay',
            'received_on'  => now(),
            'remark'       => 'Online payment successful',
        ]
    );
    // 7️⃣ Session set
    session([
        'payment_success' => true,
        'course_id'       => $course->id,
        'amount'          => $amount,
        'payment_id'      => $payment->id,
    ]);

    // 8️⃣ Redirect to dashboard
    return redirect()->route('student.dashboard')
        ->with('success', 'Payment successful! Enrollment completed.');
}



    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generated = hash_hmac('sha256', $orderId . "|" . $paymentId, env('RAZORPAY_SECRET'));

        return $generated === $signature;
    }
}
