<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        Inertia::encryptHistory();
        $credentials = $r->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login successful');

        }

        return response()->json(['message' => 'The provided credentials do not match our records.'], 401);
    }

    public function register(Request $r)
    {


        $r->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);

        Auth::login($user);

        return response()->json(['message' => 'Registration successful']);
    }

    
    public function logout(Request $r)
    {


    
        // Invalidate the session
        $r->session()->invalidate();
    
        // Regenerate the CSRF token
        $r->session()->regenerateToken();
        

        // Log out the user
        Auth::logout();
        Inertia::clearHistory();
        redirect('/');

    }
    
}


