<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Course;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function createOrder(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        // $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $api = new \Razorpay\Api\Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
        $order = $api->order->create([
            'receipt' => 'rcpt_' . time(),
            'amount' => intval($course->price * 100), // in paise
            'currency' => 'INR'
        ]);

        // Save payment in DB (optional)
        $payment = Payment::create([
            'user_id' => auth()->id() ?? null,
            'course_id' => $course->id,
            'gateway' => 'razorpay',
            'amount' => $course->price * 100,
            'currency' => 'INR',
            'status' => 'created',
            'meta' => json_encode($order),
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'key' => config('services.razorpay.key'),
            'course_name' => $course->name,
            'payment_id' => $payment->id,
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];
            $api->utility->verifyPaymentSignature($attributes);

            Payment::where('id', $request->payment_record_id)->update([
                'status' => 'success',
                'gateway_payment_id' => $request->razorpay_payment_id,
                'meta' => json_encode($request->all()),
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
    
}
