<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OtpController extends Controller
{
    public function show()
    {
        return view('auth.otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        $user = User::find(session('otp_user_id'));

        Auth::login($user);

        session()->forget(['otp', 'otp_user_id']);

        // ROLE BASED REDIRECT
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        }

        return redirect('/login');
    }
}  