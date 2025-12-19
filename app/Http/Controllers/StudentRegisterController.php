<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        // -----------------------------
        // 1️⃣ Form Validation
        // -----------------------------
        $request->validate([
            'firstname'            => 'required|string|max:255',
            'lastname'             => 'nullable|string|max:255',
            'email'                => 'required|email|unique:users,email',
            'password'             => 'required|min:6',

            'reg_date'             => 'required|date',
            'reg_no'               => 'required|unique:students,reg_no',

            'father_name'          => 'required|string|max:255',
            'date_of_birth'        => 'required|date',

            'correspondence_add'   => 'required|string',
            'permanent_add'        => 'required|string',

            'qualification'        => 'required|string|max:255',
            'college_workplace'    => 'nullable|string|max:255',

            'mobile_no'            => 'required|string|max:25',
            'residential_no'       => 'nullable|string|max:25',
            'office_no'            => 'nullable|string|max:25',

            'course_id'            => 'required|exists:courses,id',
            'course_fee'           => 'required|numeric',
        ]);

        // -----------------------------
        // 2️⃣ Create User
        // -----------------------------
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password), // Password hash
        ]);

        // -----------------------------
        // 3️⃣ GST Calculation
        // -----------------------------
        $gstAmount   = $request->course_fee * 0.18;
        $totalAmount = $request->course_fee + $gstAmount;

        // -----------------------------
        // 4️⃣ Create Student
        // -----------------------------
        Student::create([
            'user_id'            => $user->id,

            'reg_date'           => $request->reg_date,
            'reg_no'             => $request->reg_no,

            'father_name'        => $request->father_name,
            'date_of_birth'      => $request->date_of_birth,

            'correspondence_add' => $request->correspondence_add,
            'permanent_add'      => $request->permanent_add,

            'qualification'      => $request->qualification,
            'college_workplace'  => $request->college_workplace,

            'mobile_no'          => $request->mobile_no,
            'residential_no'     => $request->residential_no,
            'office_no'          => $request->office_no,

            'course_id'          => $request->course_id,
            'course_fee'         => $request->course_fee,
            'gst_amount'         => $gstAmount,
            'total_fee'          => $totalAmount,

            'is_online'          => 1, // Online student
        ]);

        // -----------------------------
        // 5️⃣ Login Student
        // -----------------------------
        auth()->login($user);

        // -----------------------------
        // 6️⃣ Clear Payment Session
        // -----------------------------
        session()->forget(['payment_success', 'course_id', 'amount']);

        // -----------------------------
        // 7️⃣ Redirect to Student Dashboard
        // -----------------------------
        return redirect()->route('student.dashboard')
            ->with('success', 'Student registered successfully!');
    }
}
