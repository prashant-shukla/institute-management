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
    // public function createOrder()
    // {

    //     // 🔐 Session check
    //     if (! session()->has('amount') || ! session()->has('type')) {
    //         abort(403, 'Invalid payment request');
    //         dd('hello');
    //     }

    //     $type   = session('type'); // course | exam
    //     $amount = session('amount');

    //     $title        = '';
    //     $originalFee  = 0;
    //     $offerFee     = $amount;
    //     $itemId       = null;

    //     /* ============================
    //  * COURSE PAYMENT
    //  * ============================ */
    //     if ($type === 'course') {

    //         $course = Course::findOrFail(session('course_id'));

    //         $title       = $course->name;
    //         $originalFee = $course->fee;
    //         $offerFee    = $course->offer_fee;
    //         $itemId      = $course->id;
    //     }

    //     /* ============================
    //  * EXAM PAYMENT
    //  * ============================ */
    //     if ($type === 'exam') {

    //         $exam = Exam::findOrFail(session('exam_id'));

    //         $title       = $exam->name;
    //         $originalFee = $exam->exam_fees;
    //         $offerFee    = $exam->exam_fees;
    //         $itemId      = $exam->id;
    //     }

    //     /* ============================
    //  * RAZORPAY ORDER
    //  * ============================ */
    //     $api = new Api(
    //         config('services.razorpay.key'),
    //         config('services.razorpay.secret')
    //     );

    //     $order = $api->order->create([
    //         'receipt'  => 'order_' . $type . '_' . $itemId,
    //         'amount'   => $offerFee * 100, // paisa
    //         'currency' => 'INR',
    //     ]);

    //     return view('payment', [
    //         'key'        => config('services.razorpay.key'),
    //         'orderId'    => $order->id,
    //         'amount'     => $offerFee,
    //         'type'       => $type,
    //         'title'      => $title,
    //         'fees'       => $originalFee,
    //         'offer_fees' => $offerFee,
    //     ]);
    // }

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

    /* =========================
     | COURSE PAYMENT
     ========================= */
    if ($request->type === 'course') {

        $course = Course::findOrFail($request->course_id);

        StudentCourse::create([
            'student_id'  => $studentId,
            'course_id'   => $course->id,
            'course_fee'  => $course->offer_fee,
            'gst_amount'  => 0,
            'total_fee'   => $request->amount,
            'status'      => 'paid',
            'enrolled_at' => now(),
        ]);
    }

    /* =========================
     | EXAM PAYMENT
     ========================= */
  if ($request->type === 'exam') {

    if (! $request->exam_id) {
        abort(400, 'Exam ID missing');
    }

    $exam = Exam::findOrFail($request->exam_id);

    // ✅ CHECK: already purchased?
    $alreadyPurchased = StudentExam::where('student_id', $studentId)
        ->where('exam_id', $exam->id)
        ->exists();

    if ($alreadyPurchased) {
        return redirect()
            ->route('student.dashboard')
            ->with('info', 'You have already purchased this exam.');
    }

    // ✅ Insert only if not exists
    StudentExam::create([
        'student_id' => $studentId,
        'exam_id'    => $exam->id,
        'exam_fee'   => $exam->exam_fees,
        'gst_amount' => 0,
        'total_fee'  => $request->amount,
        'status'     => 'paid',
        'enrolled_at'=> now(),
    ]);

    // clear session
    session()->forget([
        'student_id',
        'course_id',
        'exam_id',
        'amount',
        'type',
    ]);

    return redirect()
        ->route('student.dashboard')
        ->with('success', 'Payment successful 🎉');
}


}

// public function examPayment($examId)
// {
//     $exam = Exam::findOrFail($examId);

//     session([
//         'exam_id' => $exam->id,
//         'type'    => 'exam',
//         'amount'  => $exam->exam_fees,
//     ]);

//  $exam = Exam::findOrFail($examId);

//     return view('payment', [
//         'key'     => config('services.razorpay.key'), // ✅ FIX
//         'orderId'=> $order->id,
//         'amount' => $exam->exam_fees,
//         'type'   => 'exam',
//         'title'  => $exam->name,
//         'exam'   => $exam,
//     ]);


// }


    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generated = hash_hmac('sha256', $orderId . "|" . $paymentId, env('RAZORPAY_SECRET'));

        return $generated === $signature;
    }
}
