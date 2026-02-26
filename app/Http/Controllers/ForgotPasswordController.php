<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\Mail\ResetPasswordMail;
use App\Models\password_reset;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Show Forgot Password Form
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Forgot Password Submit
    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email is required!',
            'email.email' => 'Enter a valid email!',
            'email.exists' => 'This email is not registered!',
        ]);


        $token = Str::random(64);

        password_reset::where('email', $request->email)->delete();

        password_reset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        // Send Mail
        Mail::to($request->email)->send(new ResetPasswordMail($token));
        // SendWelcomeEmail::dispatch($request->email, $token);

        return back()->with('success', 'Reset password link has been sent to your email!');
    }

    // Show Reset Password Form
    public function resetPassword($token)
    {
        return view('auth.reset-password', compact('token'));
    }


    // Reset Password Submit
    public function resetPasswordPost(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',

    ], [
        'token.required' => 'Token missing!',
        'email.required' => 'Email is required!',
        'email.email' => 'Enter a valid email address!',
        'email.exists' => 'This email is not registered!',
        'password.required' => 'Password is required!',
        'password.min' => 'Password must be at least 6 characters!',
        'password.confirmed' => 'Confirm password does not match!',
    ]);

    // Check if token is valid
    $checkToken = password_reset::where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (!$checkToken) {
        return back()
            ->with('error', 'Invalid or expired token!')
            ->withInput(); // keep old email input
    }

    // Update user's password
    User::where('email', $request->email)->update([
        'password' => Hash::make($request->password)
    ]);

    // Delete used token
    password_reset::where('email', $request->email)->delete();

    //Redirect with success message
    return redirect()->route('login')
        ->with('success', 'Password reset successfully!');
}

}
