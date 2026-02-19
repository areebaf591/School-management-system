<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OTPController extends Controller
{
    // Show OTP input form
    public function showForm()
    {
        return view('otp');
    }

    // Send OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $otp_code = rand(100000, 999999);

        Otp::create([
            'user_id' => $user->id,
            'otp' => $otp_code,
            'is_used' => false,
            'expires_at' => now()->addMinutes(5),
        ]);

       
        session(['otp_user_id' => $user->id]);

        return back()->with('message', "OTP has been sent to your email (demo: $otp_code)");
    }

    // Verify OTP
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otp = Otp::where('otp', $request->otp)
                  ->where('user_id', session('otp_user_id'))
                  ->where('is_used', false)
                  ->where('expires_at', '>=', now())
                  ->first();

       

        $otp->update(['is_used' => true]);

        $user = $otp->user;

        if ($user->status !== 'active') {
            return redirect()->route('login')->with('error', 'Your account is not active yet.');
        }

        Auth::login($user);

        // Redirect based on role
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        }
        if ($user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        abort(403);
    }
}
