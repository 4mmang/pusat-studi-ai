<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function validation(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->with([
            'message' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        // memanggil fungsi logout dari class Auth
        Auth::logout();
        // method ini juga akan memanggil 2 fungsi dibawah
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // dan mengembalikan kehalaman login
        return redirect('login');
    }
}
