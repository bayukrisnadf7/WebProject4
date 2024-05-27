<?php

namespace App\Http\Controllers;

use App\Models\BidBarang;
use App\Models\Notifikasi;
use App\Models\Barang;
use App\Models\PembayaranBarang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
{
    $nik = auth()->user()->nik;
    $barang = BidBarang::with(['barang', 'user', 'pembayaran'])
        ->where('status', 'Pemenang')
        ->where('nik', $nik)
        ->get();

    return view('pembayaran.index', compact('barang'));
}
    public function showPembayaranBarang($id_barang)
    {
        $barang = BidBarang::with(['barang' => function ($query) {
            $query->with('pengajuanLelang');
        }])
            ->where('status', 'Pemenang')
            ->where('id_barang', $id_barang)
            ->first();
        $pengajuan = $barang ? $barang->barang->pengajuanLelang : null;

        return view('pembayaran.pembayaran_barang', compact('barang', 'pengajuan'));
    }
    public function pembayaranBarang(Request $request, $id_barang)
    {
        $nik = auth()->user()->nik;

        // Retrieve the Barang instance
        $barang = Barang::where('id_barang', $id_barang)->first();

        // Check if the Barang instance exists
        if (!$barang) {
            return redirect('/transaksi')->with('error', 'Barang tidak ditemukan');
        }

        // Check if the request has the foto_transfer file
        if ($request->hasFile('foto_transfer')) {
            $image = $request->file('foto_transfer');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/bukti_transfer'), $imageName);
        } else {
            throw new \Exception('Foto tidak ditemukan dalam request.');
        }

        // Create PembayaranBarang instance
        $pembayaran = PembayaranBarang::create([
            'foto_transfer' => $imageName,
            'status_pembayaran' => 'Diproses',
            'id_barang' => $barang->id_barang,
            'nik' => $nik,
        ]);

        // Check if the PembayaranBarang instance was created successfully
        if ($pembayaran) {
            // Update status_pembayaran in the Barang model
            $barang->update(['status_pembayaran' => 'Diproses']);
            return redirect('/transaksi')->with('success', 'Pembayaran Berhasil, Silahkan Menunggu Konfirmasi');
        } else {
            return redirect('/transaksi')->with('error', 'Pembayaran Gagal');
        }
    }
    public function pembayaranDiterima($id_pembayaran)
    {
        // Find the pembayaran by its ID
        $pembayaran = PembayaranBarang::findOrFail($id_pembayaran);
        $nik = $pembayaran->user->nik;
        // Update the status of the pembayaran
        $pembayaran->update(['status_pembayaran' => 'Diterima']);
        $waktu_sekarang = date('Y-m-d H:i:s');
        Notifikasi::create([
            'nik' => $nik, // Simpan NIK pengguna dalam notifikasi
            'pesan' => 'Selamat! Transaksimu Diterima, Silahkan Menghubungi Pemilik Barang Untuk Informasi Pengiriman Barang',
            'waktu' => $waktu_sekarang,
        ]);
        // Update the status of the corresponding Barang
        $barang = Barang::findOrFail($pembayaran->id_barang);
        $barang->update(['status_pembayaran' => 'Diterima']);

        
        return redirect('/riwayat_lelang_barang')->with('successPembayaran', 'Pembayaran Diterima, Silahkan menghubungi pembeli untuk pengiriman barang');
        // Redirect or return a response
    }
    public function pembayaranDitolak($id_pembayaran)
    {
        $pembayaran = PembayaranBarang::findOrFail($id_pembayaran);

        // Update the status of the pembayaran
        $pembayaran->update(['status_pembayaran' => 'Ditolak']);

        // Update the status of the corresponding Barang
        $barang = Barang::findOrFail($pembayaran->id_barang);
        $barang->update(['status' => 'Ditolak']);
    }
}
