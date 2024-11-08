<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request) {
        {
           $validatedData = $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|max:255',
               'phone' => 'required|string|max:15',
               'message' => 'required|string|max:1000',
           ]);
   
           Contact::create($validatedData);
   
           return redirect()->back()->with('success', 'Registration successful!');
       
    }
   
   }
}
