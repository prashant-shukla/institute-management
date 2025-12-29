<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentFee;
use App\Models\Course;
use App\Models\Payment;
use App\Models\StudentFees;
use Illuminate\Support\Facades\DB;

class StudentRegisterController extends Controller
{
    /**
     * ----------------------------------------------------------
     * Show Student Registration Form
     * ----------------------------------------------------------
     * Ye function payment success ke baad
     * student registration ka blade form open karta hai.
     * Agar payment successful nahi hua ho to access deny.
     */
    public function create()
    {
        if (!session('payment_success')) {
            return redirect()->route('payment.page')
                ->with('error', 'Please complete payment first.');
        }

        return view('students.register');
    }
    /**
     * ----------------------------------------------------------
     * Store Student & User Data
     * ----------------------------------------------------------
     * Ye function blade form se aane wale data ko:
     * 1️⃣ Validate karta hai
     * 2️⃣ User create karta hai
     * 3️⃣ Student record create karta hai
     * 4️⃣ Student ko login kar deta hai
     */


public function store(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $validated = $request->validate([
        'firstname'          => 'required|string|max:255',
        'lastname'           => 'nullable|string|max:255',

        'father_name'        => 'required|string|max:255',
        'date_of_birth'      => 'required|date',

        'correspondence_add' => 'required|string',
        'permanent_add'      => 'required|string',

        'qualification'      => 'required|string|max:255',

        'mobile_no'          => 'required|string|max:25',

        'course_id'          => 'required|exists:courses,id',
    ]);

    return DB::transaction(function () use ($validated) {

        $user = auth()->user();

        // 1️⃣ Update user name
        $user->update([
            'firstname' => $validated['firstname'],
            'lastname'  => $validated['lastname'],
        ]);

        // 2️⃣ STUDENT (ONE PER USER)
        $student = Student::firstOrCreate(
            ['user_id' => $user->id],
            [
                'reg_no'             => 'REG-' . now()->format('Ymd') . '-' . rand(100,999),
                'father_name'        => $validated['father_name'],
                'date_of_birth'      => $validated['date_of_birth'],
                'correspondence_add' => $validated['correspondence_add'],
                'permanent_add'      => $validated['permanent_add'],
                'qualification'      => $validated['qualification'],
                'mobile_no'          => $validated['mobile_no'],
                'is_online'          => 1,
            ]
        );

       $course = Course::findOrFail($validated['course_id']);
       
        // 3️⃣ Store session for payment
        session([
            'student_id' => $student->id,
            'course_id'  => $course->id,
            'amount'     => $course->offer_fee,
        ]);

        // 6️⃣ Redirect to payment page
        return redirect()->route('payment.page', $course->id)
            ->with('success', 'Student registered. Please complete payment.');
    });
}




}
