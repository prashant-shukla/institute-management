<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'comments' => 'nullable|string|max:500',
            'attending' => 'required|in:Yes,No',
        ]);

        EventRegistration::create($validatedData);

        return redirect()->back()->with('success', 'Registration successful!');
    }
}


