<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        // session clear
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ Filament Admin Login page par redirect
        return redirect()->route('filament.admin.auth.login');
    }
}
