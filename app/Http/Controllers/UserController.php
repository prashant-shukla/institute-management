<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Illuminate\Support\Str;

class UserController extends Controller
{
// 🧾 Show Register Form
    public function showRegister()
    {
        // Make sure this file exists: resources/views/register.blade.php
        return view('register');
    }

    // 💾 Handle Register Save
    public function storeRegister(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Create User
        User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'name' => trim($request->firstname . ' ' . $request->lastname),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        // ✅ Redirect after registration
        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! Please login.');
    }



    // Show Login Form
    public function login()
    {
        return view('login');
    }

    // Handle Login
    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
