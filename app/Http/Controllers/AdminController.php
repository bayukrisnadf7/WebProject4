<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PengajuanLelang;
use App\Models\Notifikasi;
use App\Models\Register;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $jumlah_user = Register::where('status', '1')->count();
        $jumlah_pelelang = Register::where('status', '2')->count();
        $jumlah_barang = Barang::all()->count();
        $user = Register::all();
        return view('admin.index', compact('jumlah_user', 'jumlah_pelelang', 'jumlah_barang', 'user'));
    }

    public function user(){
        $user = Register::all();
        return view('admin.user', compact('user'));
    }
    public function barang(){
        $barang = Barang::all();
        return view('admin.barang', compact('barang'));
    }

    public function pengajuanLelang(){
        return view('admin.pengajuan_lelang',[
            'dataPengajuan' => PengajuanLelang::with('user')->where('status', 'Diproses')->get(),
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
        $waktu_sekarang = date('Y-m-d H:i:s');
        // Buat notifikasi untuk user yang diterima sebagai pelelang
        Notifikasi::create([
            'nik' => $user->nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Selamat! Anda telah menjadi pelelang.',
            'waktu' => $waktu_sekarang,
        ]);
    }

    // Redirect kembali ke halaman /pengajuan_lelang setelah selesai
    return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan berhasil diterima.');
}
    public function tolakPengajuan($id_pengajuan){
        $pengajuan = PengajuanLelang::findOrFail($id_pengajuan);
        $pengajuan->delete();
        $user = User::where('nik', $pengajuan->nik)->first();
        $waktu_sekarang = date('Y-m-d H:i:s');
        Notifikasi::create([
            'nik' => $user->nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Pengajuan Anda ditolak!, Silahkan Ajukan Kembali.',
            'waktu' => $waktu_sekarang,
        ]);
        return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan Ditolak.');
    }

    public function showPengajuanBarang(){
        return view('admin.pengajuan_barang',[
            'pengajuan_barang' => Barang::where('status', 'Diproses')->get()
        ]);
    }
    public function seleksiPengajuanBarang($id_barang){
        return view('admin.seleksi_pengajuan_barang',[
            'barang' => Barang::findOrFail($id_barang)
        ]);
    }
    public function terimaPengajuanBarang($id_barang){
        $pengajuan_barang = Barang::findOrFail($id_barang);

        $pengajuan_barang->update([
            'status' => 'Open'
        ]);
        $user = User::where('nik', $pengajuan_barang->nik)->first();
        $waktu_sekarang = date('Y-m-d H:i:s');
        Notifikasi::create([
            'nik' => $user->nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Pengajuan '. $pengajuan_barang->nama_barang.' anda diterima!. Silahkan cek riwayat lelang barang anda.',
            'waktu' => $waktu_sekarang,
        ]);
        return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan berhasil diterima.');
    }
    public function tolakPengajuanBarang($id_barang){
        $pengajuan_barang = Barang::findOrFail($id_barang);
        $pengajuan_barang->delete();
        $user = User::where('nik', $pengajuan_barang->nik)->first();
        $waktu_sekarang = date('Y-m-d H:i:s');
        Notifikasi::create([
            'nik' => $user->nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Pengajuan '. $pengajuan_barang->nama_barang.'Anda Ditolak! Silahkan Ajukan Lagi Dengan Data Yang Benar.',
            'waktu' => $waktu_sekarang,
        ]);
        return redirect('/pengajuan_lelang')->with('successPengajuan', 'Pengajuan Ditolak.');
    }
}
