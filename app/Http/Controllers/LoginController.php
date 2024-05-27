<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Kondisi 1: Jika email dan password adalah admin
        if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin') {
            // Redirect ke halaman admin
            return redirect()->route('admin.form');
        }

        // Kondisi 2: Jika bukan admin, lakukan proses otentikasi standar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('successLogin', 'Login Berhasil');
        }

        // Jika tidak cocok dengan kondisi manapun, kembali ke halaman login dengan pesan kesalahan
        return back()->with('errorLogin', 'Email atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
