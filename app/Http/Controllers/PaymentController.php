<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;


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
    // 1️⃣ Razorpay required fields check
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

    // 3️⃣ Course & amount
    $course = Course::findOrFail($request->course_id);
    $amount = $course->offer_fee ?? $course->fee;

    // 4️⃣ SAVE PAYMENT (GUARANTEED CHECK)
    $payment = Payment::create([
        'user_id'            => Auth::id(), // null allowed
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

    // ❌ Agar payment save nahi hui
    if (!$payment || !$payment->id) {
        return redirect()->back()->with('error', 'Payment failed. Please contact support.');
    }

    // 5️⃣ Session set (ONLY AFTER payment saved)
    session([
        'payment_success' => true,
        'course_id'       => $course->id,
        'amount'          => $amount,
        'payment_id'      => $payment->id,
    ]);

    // 6️⃣ Redirect to student register
    return redirect()->route('student.register')
        ->with('success', 'Payment successful! Please complete your registration.');
}


    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generated = hash_hmac('sha256', $orderId . "|" . $paymentId, env('RAZORPAY_SECRET'));

        return $generated === $signature;
    }
    
}
