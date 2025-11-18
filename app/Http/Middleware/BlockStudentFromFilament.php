<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockStudentFromFilament
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // If logged in but not super admin → redirect to student dashboard
        if ($user && !$user->hasRole('super_admin')) {
            return redirect('/student/dashboard');
        }

        return $next($request);
    }
}
