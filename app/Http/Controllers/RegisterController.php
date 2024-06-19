<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
{
    try {
        // Validasi data dari request
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|size:16|unique:users,nik',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required|max:255',
            'nohp' => 'required|numeric|unique:users,nohp',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8|max:255',
            'password2' => 'required|same:password', // Memastikan password2 sama dengan password
            'agreeCheckbox' => 'accepted',
        ], [
            'password2.same' => 'Password tidak sama.',
            'agreeCheckbox.accepted' => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);

        // Simpan file foto ke dalam direktori 'public/uploads'
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/ktp'), $imageName);
        } else {
            throw new \Exception('Foto tidak ditemukan dalam request.');
        }

        // Simpan data pengguna baru ke dalam database
        $register = Register::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'alamat' => $validatedData['alamat'],
            'nohp' => $validatedData['nohp'],
            'foto' => $imageName, // Simpan nama file gambar
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'status' => 1,
        ]);

        if ($register) {
            return redirect('/register')->with('registSucces', 'Registrasi berhasil. Silahkan login');
        } else {
            throw new \Exception('Gagal menyimpan data pengguna baru.');
        }
    } catch (\Exception $th) {
        return redirect('/register')->with('registError', 'Registrasi gagal: ' . $th->getMessage());
    }
}


}
