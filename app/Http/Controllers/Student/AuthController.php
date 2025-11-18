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
        'email' => 'required',
        'password' => 'required'
    ]);

    // Attempt login from `users` table
    if (Auth::attempt($request->only('email', 'password'))) {

        $user = Auth::user();

        // Check ANY of these fields contain 'student'
        $isStudent =
            ($user->role ?? null) === 'student' ||
            ($user->user_type ?? null) === 'student' ||
            ($user->type ?? null) === 'student' ||
            ($user->user_role ?? null) === 'student' ||
            ($user->name ?? null) === 'student'; // you said name = student also possible

        if ($isStudent) {
            return redirect()->route('student.dashboard');
        }

        // Not a student → logout and throw error
        Auth::logout();
        return back()->withErrors(['email' => 'Only students can login here.']);
    }

    return back()->withErrors(['email' => 'Invalid login details']);
}




}
