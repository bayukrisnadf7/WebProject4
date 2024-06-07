<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $email = $user->email;

        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('users')
            ->where('email', $email)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'updated_at' => now(),  // This will set the updated_at column to the current timestamp
            ]);

        return redirect('/profile')->with('successUpdate', 'Data profile berhasil diperbarui');
    }
    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8', // Using password confirmation validation
        ]);

        if ($validator->fails()) {
            return redirect('/profile')->withErrors($validator)
                ->withInput();
        }

        // Update the user's account details using Query Builder
        DB::table('users')
            ->where('nik', $user->nik)
            ->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

        return redirect('/profile')->with('successUpdate', 'Data profile berhasil diperbarui');
    }
}
