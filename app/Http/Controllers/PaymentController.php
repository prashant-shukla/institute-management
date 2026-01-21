<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;      // ✅ THIS IS IMPORTANT
use App\Models\StudentFees;
use App\Models\Exam;
use App\Models\StudentCourse;
use App\Models\StudentExam;

class PaymentController extends Controller
{


    public function createOrder()
    {
        if (! session('student_id') || ! session('amount')) {
            abort(403, 'Invalid payment request');
        }

        $type   = session('type');
        $amount = session('amount');

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $order = $api->order->create([
            'receipt'  => 'order_' . uniqid(),
            'amount'   => $amount * 100,
            'currency' => 'INR',
        ]);

        /* ======================
     * COURSE PAYMENT
     * ====================== */
        if ($type === 'course') {

            $course = Course::findOrFail(session('course_id'));

            return view('payment', [
                'key'         => config('services.razorpay.key'),
                'orderId'     => $order->id,
                'amount'      => $amount,
                'type'        => 'course',

                'title'       => $course->name,
                'fees'        => $course->fee,
                'offer_fees'  => $course->offer_fee,

                'courseId'    => $course->id,
                'examId'      => null,
            ]);
        }

        /* ======================
     * EXAM PAYMENT
     * ====================== */
        if ($type === 'exam') {

            $exam = Exam::findOrFail(session('exam_id'));

            return view('payment', [
                'key'         => config('services.razorpay.key'),
                'orderId'     => $order->id,
                'amount'      => $amount,
                'type'        => 'exam',

                'title'       => $exam->name,
                'fees'        => $exam->exam_fees,
                'offer_fees'  => $exam->exam_fees,

                'courseId'    => null,
                'examId'      => $exam->id,
            ]);
        }

        abort(403);
    }


    public function paymentSuccess(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required',
            'razorpay_order_id'   => 'required',
            'razorpay_signature'  => 'required',
            'type'                => 'required|in:course,exam',
            'amount'              => 'required|numeric',
            'course_id'           => 'nullable|exists:courses,id',
            'exam_id'             => 'nullable|exists:exams,id',
        ]);

        $studentId = session('student_id');

        if (! $studentId) {
            abort(403, 'Invalid payment session');
        }

        /* =================================
       ✅ COURSE PAYMENT
    ================================= */
        if ($request->type === 'course') {

            $course = Course::findOrFail($request->course_id);

            /** 🔹 1. INSERT INTO student_courses (IMPORTANT) **/
            \App\Models\StudentCourse::firstOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id'  => $course->id,
                ],
                [
                    'course_fee'  => $course->offer_fee,
                    'gst'         => 0,
                    'discount'    => 0,
                    'total_fee'   => $course->offer_fee,
                    'status'      => 'active',
                    'enrolled_at' => now(),
                ]
            );



            /** 🔹 2. INSERT INTO student_fees **/
            \App\Models\StudentFees::create([
                'receipt_no'      => 'RCPT-' . time(),
                'student_id'      => $studentId,
                'course_id'       => $course->id,
                'fee_amount'      => $course->offer_fee,
                'gst_amount'      => 0,
                'discount_amount' => 0,
                'received_on'     => now(),
                'payment_mode'    => 'online',
                'remark'          => 'Course Purchase',
            ]);

            session()->forget([
                'student_id',
                'course_id',
                'exam_id',
                'amount',
                'type',
            ]);

            return redirect()
                ->route('student.dashboard')
                ->with('success', 'Course purchased successfully 🎉');
        }

        /* =================================
       ✅ EXAM PAYMENT
    ================================= */
        if ($request->type === 'exam') {

            $exam = Exam::findOrFail($request->exam_id);

            $already = \App\Models\StudentExam::where('student_id', $studentId)
                ->where('exam_id', $exam->id)
                ->exists();

            if ($already) {
                return redirect()
                    ->route('student.dashboard')
                    ->with('info', 'You already purchased this exam.');
            }

            \App\Models\StudentExam::create([
                'student_id' => $studentId,
                'exam_id'    => $exam->id,
                'exam_fee'   => $exam->exam_fee,
                'discount'   => 0,
                'gst_amount' => 0,
                'total_fee'  => $request->amount,
                'status'     => 'paid',
                'enrolled_at' => now(),
            ]);

            session()->forget([
                'student_id',
                'course_id',
                'exam_id',
                'amount',
                'type',
            ]);

            return redirect()
                ->route('student.dashboard')
                ->with('success', 'Exam purchased successfully 🎉');
        }
    }



    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generated = hash_hmac('sha256', $orderId . "|" . $paymentId, env('RAZORPAY_SECRET'));

        return $generated === $signature;
    }
}
