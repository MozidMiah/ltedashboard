<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register Page
    public function register()
    {
        return view('auth.register');
    }

    // Register Store
    public function registerStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:20',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Please enter a valid email!',
            'email.unique' => 'This email already exists!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 6 characters!',
            'password.confirmed' => 'Password confirmation does not match!',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('message', 'Registration Successful!');
    }

    // Login Page
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // Login Check
    public function loginCheck(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email is required!',
            'email.email' => 'Enter a valid email address!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 6 characters!',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('message', 'Login Successful!');
        }

        return back()->with('error', 'Invalid Email or Password')->withInput();
    }

    // Dashboard Page
    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('login')->with('error', 'Please login first!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logout Successful');
    }
}
