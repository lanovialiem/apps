<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManualController extends Controller
{
    public function index()
    {
        return view('manual-auth.login');
    }

    public function loginProses(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('welcome');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // cek apakah email ada
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Please sign up first!'
            ])->onlyInput('email');
        }

        // kalau email ada, coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('welcome');
        }

        // kalau password salah
        return back()->withErrors([
            'password' => 'Password atau Email Salah!'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil!');
    }
}