<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStudent
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        // ❌ student record nahi hai
        if (! $user->student) {
            Auth::logout();

            return redirect()
                ->route('login')
                ->with('error', 'You are not registered as a student.');
        }

        return $next($request);
    }
}


