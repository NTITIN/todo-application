<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/home')->with('success', 'Login successful!');
        }
        return redirect('login')->with('error', 'Oops! You have entered invalid credentials');

    }

    public function logout()
    {

        Auth::logout();

        return redirect('admin/login')->with('success', 'Logged out successfully!');

    }
}
