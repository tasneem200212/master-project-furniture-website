<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect based on user role
        if ($user->role === 'admin') {
            session()->flash('welcome_message', 'Welcome, ' . $user->name . '!');
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('welcome_message', 'Welcome, ' . $user->name . '!');
            return redirect()->route('Pro.index');
            
        }
    }

    return back()->with('error', 'Invalid credentials. Please try again.');
}


    public function logout()
    {
            session()->forget('cart');

        Auth::logout();
        return redirect()->route('login');
    }
}
