<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        $credentials = $r->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();
            return response()->json(['message' => 'Login successful']);
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
}


