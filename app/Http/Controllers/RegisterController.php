<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|min:16|max:16|unique:users',
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|min:11|max:13|unique:users',
            'password' => 'required|min:7|max:255',
        ]);
        // merubah password menjadi bcryp
        $validatedData['password'] = Hash::make($validatedData['password']);
        // untuk memasukan data ke database
        Register::create($validatedData);
        // setelah masuk lalu diarahkan ke login
        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
