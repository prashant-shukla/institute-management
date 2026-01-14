<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentFee;
use App\Models\Course;
use App\Models\Exam;
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
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'firstname'          => 'required|string|max:255',
            'lastname'           => 'nullable|string|max:255',
            'father_name'        => 'required|string|max:255',
            'date_of_birth'      => 'required|date',
            'correspondence_add' => 'required|string',
            'permanent_add'      => 'nullable|string',
            'qualification'      => 'required|string|max:255',
            'mobile_no'          => 'required|string|max:25',
            'course_id'          => 'nullable|exists:courses,id',
            'exam_id'            => 'nullable|exists:exams,id',
        ]);

        if (empty($validated['course_id']) && empty($validated['exam_id'])) {
            return back()->withErrors([
                'course_id' => 'Please select a course or exam',
            ]);
        }

        return DB::transaction(function () use ($validated) {

            $user = auth()->user();

            $validated['permanent_add']
                = $validated['permanent_add']
                ?? $validated['correspondence_add'];

            $user->update([
                'firstname' => $validated['firstname'],
                'lastname'  => $validated['lastname'],
            ]);

            $student = Student::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'reg_no'             => 'REG-' . now()->format('Ymd') . '-' . rand(100, 999),
                    'father_name'        => $validated['father_name'],
                    'date_of_birth'      => $validated['date_of_birth'],
                    'correspondence_add' => $validated['correspondence_add'],
                    'permanent_add'      => $validated['permanent_add'],
                    'qualification'      => $validated['qualification'],
                    'mobile_no'          => $validated['mobile_no'],
                    'is_online'          => 1,
                ]
            );

            /* =========================
 * COURSE PAYMENT
 * ========================= */
            if (! empty($validated['course_id'])) {

                $course = Course::findOrFail($validated['course_id']);

                session([
                    'student_id' => $student->id,
                    'course_id'  => $course->id,
                    'exam_id'    => null,
                    'amount'     => $course->offer_fee,
                    'type'       => 'course',
                ]);

                return redirect()->route('payment.page');
            }

            /* =========================
 * EXAM PAYMENT
 * ========================= */
            if (! empty($validated['exam_id'])) {

                $exam = Exam::findOrFail($validated['exam_id']);

                session([
                    'student_id' => $student->id,
                    'course_id'  => null,
                    'exam_id'    => $exam->id,
                    'amount'     => $exam->exam_fee,
                    'type'       => 'exam',
                ]);

                return redirect()->route('payment.page');
            }
        });
    }
}
