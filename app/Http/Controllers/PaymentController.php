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
        return "Payment Failed! Missing Razorpay Data.";
    }

    // 2️⃣ Verify signature
    $signatureStatus = $this->verifySignature(
        $request->razorpay_order_id,
        $request->razorpay_payment_id,
        $request->razorpay_signature
    );

    if (!$signatureStatus) {
        return "Payment Failed! Signature mismatch.";
    }

    // 3️⃣ Course से amount निकालो (IMPORTANT FIX)
    $course = Course::findOrFail($request->course_id);
    $amount = $course->offer_fee; // NEVER NULL now

    // 4️⃣ Save payment
    Payment::create([
        'user_id'            => Auth::id(),
        'course_id'          => $course->id,
        'gateway'            => 'razorpay',
        'gateway_payment_id' => $request->razorpay_payment_id,
        'amount'             => $amount, // ✅ FIXED
        'currency'           => 'INR',
        'status'             => 'success',
        'meta'               => json_encode([
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_signature' => $request->razorpay_signature,
        ]),
    ]);

    return "Payment Successful & Saved!";
}


    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generated = hash_hmac('sha256', $orderId . "|" . $paymentId, env('RAZORPAY_SECRET'));

        return $generated === $signature;
    }
    
}
