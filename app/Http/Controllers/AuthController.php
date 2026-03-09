<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show Login Page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Show Register Page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register Logic
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'customer',
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // Login Logic
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    $request->session()->regenerate(); // ✅ yeh line add karo
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($user->role === 'vendor') {
        return redirect('/vendor/dashboard');
    } else {
        return redirect('/');
    }
}

        return back()->withErrors(['email' => 'Email ya password galat hai!']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
