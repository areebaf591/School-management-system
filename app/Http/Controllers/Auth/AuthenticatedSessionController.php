<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if($user->status === 'pending') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email'=>'Your account is pending approval.']);
        }

        if($user->status === 'rejected') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email'=>'Your account is rejected. Contact admin.']);
        }

        if($user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        if($user->hasAnyRole(['admin','teacher'])) {
            $otp = rand(100000,999999);
            session(['otp'=>$otp,'otp_user_id'=>$user->id]);
            Mail::to($user->email)->send(new OTPMail($otp));
            Auth::logout();
            return redirect()->route('otp.form')->with('message','OTP sent to your email.');
        }

        Auth::logout();
        return redirect()->route('login')->withErrors(['email'=>'No role assigned.']);
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
