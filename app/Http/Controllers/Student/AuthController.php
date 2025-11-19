<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 🔹 Default guard (web) se attempt
        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();

            // 🔹 Agar Spatie roles use ho rahe -> hasRole
            if (method_exists($user, 'hasRole') && $user->hasRole('student')) {
                return redirect()->route('student.dashboard');
            }

            // agar roles table nahi use kar rahe, simple column se check:
            if (($user->role ?? null) === 'student') {
                return redirect()->route('student.dashboard');
            }

            // Student nahi hai → logout + error
            Auth::logout();
            return back()->withErrors(['email' => 'Only students can login here.']);
        }

        return back()->withErrors(['email' => 'Invalid login details']);
    }
}
