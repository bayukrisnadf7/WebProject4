<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLelang;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [

        ]);
    }
    public function pengajuanLelang(){
        return view('admin.pengajuan_lelang',[
            'dataPengajuan' => PengajuanLelang::where('status', 'Diproses')->get(),
            'data_user'
        ]);
    }
    public function seleksiPengajuan($id_pengajuan){
        return view('admin.seleksi_pengajuan', [
            'dataPengajuan' => PengajuanLelang::find($id_pengajuan),
            'dataUser' => User::all(),
        ]);
    }
    public function terimaPengajuan($id_pengajuan)
{
    // Cari pengajuan lelang berdasarkan ID
    $pengajuan = PengajuanLelang::findOrFail($id_pengajuan);

    // Update status pengajuan lelang menjadi "Diterima"
    $pengajuan->update([
        'status' => 'Diterima'
    ]);

    // Cari user berdasarkan NIK pada pengajuan lelang
    $user = User::where('nik', $pengajuan->nik)->first();

    if ($user) {
        // Update status user menjadi "2" (atau status yang sesuai dengan kebutuhan Anda)
        $user->update([
            'status' => '2'
        ]);

        // Buat notifikasi untuk user yang diterima sebagai pelelang
        Notifikasi::create([
            'nik' => $user->nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Selamat! Anda telah menjadi pelelang.'
        ]);
    }

    // Redirect kembali ke halaman /pengajuan_lelang setelah selesai
    return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan berhasil diterima.');
}
    public function tolakPengajuan($id_pengajuan){
        $pengajuan = PengajuanLelang::findOrFail($id_pengajuan);
        $pengajuan->delete();
        return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan Ditolak.');
    }
}
