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

        $list_pelelang = BidBarang::where('id_barang', $id_barang)->where('status', 'Diproses')->orderBy('harga_bid', 'DESC')->with('user')->get();
        return view('barang.pemenang_lelang', compact('list_pelelang'));
    }
    public function pemenangLelangBarang($nik, $id_barang, $id)
    {
        $bid = BidBarang::where('id', $id) // Menambahkan kondisi where id
        ->where('nik', $nik)
        ->where('id_barang', $id_barang)
        ->first();
        
        $barang = Barang::findOrFail($id_barang);

        if ($bid) {
            $bid->status = 'Pemenang';
            $bid->save();
            $waktu_sekarang = date('Y-m-d H:i:s');
        // Buat notifikasi untuk user yang diterima sebagai pelelang
            Notifikasi::create([
            'nik' => $nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Selamat! anda telah menjadi pemenang lelang barang ' . $barang->nama_barang . ' Silahkan lanjut pembayaran pada menu transaksi',
            'waktu' => $waktu_sekarang,
        ]);
        $barang->update([
            'status' => 'Closed',
            'status_pembayaran' => 'Pemenang Dipilih'
        ]);
        }
        return redirect('/riwayat_lelang_barang')->with('status', 'Status updated to Pemenang');
    }

    public function tolakLelangBarang($nik, $id_barang, $id)
    {
        $bid = BidBarang::where('id', $id) // Menambahkan kondisi where id
        ->where('nik', $nik)
        ->where('id_barang', $id_barang)
        ->first();
        $barang = Barang::findOrFail($id_barang);
        if ($bid) {
            $bid->status = 'Kalah';
            $bid->save();
            $waktu_sekarang = date('Y-m-d H:i:s');
        // Buat notifikasi untuk user yang diterima sebagai pelelang
            Notifikasi::create([
            'nik' => $nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Maaf! anda kalah dalam lelang barang ' . $barang->nama_barang,
            'waktu' => $waktu_sekarang,
        ]);
    }
        return back()->with('status', 'Status updated to Kalah');
    }
}
