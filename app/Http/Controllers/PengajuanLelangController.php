<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLelang;
use Illuminate\Http\Request;

class PengajuanLelangController extends Controller
{
    public function show(){
        $user = auth()->user();
    
        // Cek apakah user sudah memiliki pengajuan yang sedang diproses atau ditolak
        $pengajuan = PengajuanLelang::where('nik', $user->nik)
            ->whereIn('status', ['Diproses', 'Ditolak'])
            ->first();
    
        if ($pengajuan) {
            // Jika ada pengajuan yang sedang diproses atau ditolak, tampilkan pesan sesuai status
            if ($pengajuan->status === 'Diproses') {
                return view('pengajuan.pengajuan_diproses');
            } else {
                return view('pengajuan.lelang');
            }
        } else {
            // Jika tidak ada pengajuan yang sedang diproses atau ditolak, tampilkan formulir
            return view('pengajuan.lelang');
        }
    }
    
    public function insertDataPengajuan(Request $request){
        $request->validate([
            'bank' => 'required',
            'no_rek' => 'required',
            'scan_ktp' => 'required',
            'status'=> 'required',
        ]);
        try {
            if ($request->hasFile('scan_ktp')) {
                // Simpan file ke dalam direktori 'storage/barang'
                $nama_file = $request->file('scan_ktp')->storeAs('public/scan_ktp', $request->file('scan_ktp')->getClientOriginalName());
    
                // Dapatkan URL file yang disimpan
                $url_file = $request->file('scan_ktp')->getClientOriginalName();
    
                $nik = auth()->user()->nik;
                // Simpan nama file ke dalam database
                PengajuanLelang::create([
                    'bank' => $request->bank,
                    'no_rek' => $request->no_rek,
                    'scan_ktp' => $url_file,  // Simpan URL file di database
                    'status' => $request->status,
                    'nik' => $nik,
                ]);
    
                return redirect('/')->with('success', 'Pengajuan berhasil, harap tunggu');
            }
        } catch (\Exception $th) {
            return redirect('/pengajuan')->with('gagal', 'Pengajuan gagal, periksa kembali data');
        }
    }
}
