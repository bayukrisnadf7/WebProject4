<?php

namespace App\Http\Controllers;

use App\Models\BidBarang;
use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\Barang;

class PemenangController extends Controller
{
    public function index($id_barang)
    {
        $list_pelelang = BidBarang::where('id_barang', $id_barang)->get();

        // if ($list_pelelang->isEmpty()) {
        //     $tidakAdaPembeli = 'Barang kamu masih belum ada pembeli';
        // }

        return view('barang.pemenang_lelang', compact('list_pelelang'));
    }
    public function pemenangLelangBarang($nik, $id_barang)
    {
        $bid = BidBarang::where('nik', $nik)->where('id_barang', $id_barang)->first();
        $barang = Barang::findOrFail($id_barang);

        if ($bid) {
            $bid->status = 'Pemenang';
            $barang->status = 'Closed';
            $bid->save();
            $waktu_sekarang = date('Y-m-d H:i:s');
        // Buat notifikasi untuk user yang diterima sebagai pelelang
            Notifikasi::create([
            'nik' => $nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Selamat! Anda Telah Menjadi Pemenang Lelang Barang ' . $barang->nama_barang,
            'waktu' => $waktu_sekarang,
        ]);
        }
        return redirect('/riwayat_lelang_barang')->with('status', 'Status updated to Pemenang');
    }

    public function tolakLelangBarang($nik, $id_barang)
    {
        $bid = BidBarang::where('nik', $nik)->where('id_barang', $id_barang)->first();
        $barang = Barang::findOrFail($id_barang);
        if ($bid) {
            $bid->status = 'Kalah';
            $bid->save();
            $waktu_sekarang = date('Y-m-d H:i:s');
        // Buat notifikasi untuk user yang diterima sebagai pelelang
            Notifikasi::create([
            'nik' => $nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Maaf! Anda Kalah Dalam Lelang Barang ' . $barang->nama_barang,
            'waktu' => $waktu_sekarang,
        ]);
    }
        return redirect('/riwayat_lelang_barang')->with('status', 'Status updated to Kalah');
    }
}
