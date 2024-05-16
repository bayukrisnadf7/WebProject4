<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BidBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BarangController extends Controller
{
    public function index()
    {
    $barang = Barang::where('status', 'Open')->get();
    return view('home.home', compact('barang'));
    }
    public function index2()
    {
        return view('barang.upload');
    }
    public function index3(){
        return view('home.home');
    }
    public function show($id)
    {
        $detail_barang = Barang::find($id);

        $namaPemilik = $detail_barang->user->nama;


        $bid_barang = BidBarang::with('user') // Eager load relasi user
            ->where('id_barang', $id)
            ->orderBy('harga_bid', 'desc')
            ->get();

        return view('barang.detail', compact('detail_barang', 'bid_barang', 'namaPemilik'));
    }

    public function showHistoryBid(){
        // Mendapatkan informasi pengguna yang sedang diautentikasi
        $user = Auth::user();
        
        // Mengambil riwayat bid berdasarkan nik pengguna yang sedang diautentikasi
        $riwayat_bid = BidBarang::where('nik', $user->nik)->get();
    
        return view('barang.history', ['riwayat_bid' => $riwayat_bid]);
    }

    public function showRiwayatLelang(){
        // Mengambil nik pengguna yang saat ini diautentikasi
        $nik_pengguna = auth()->user()->nik;
    
        // Mengambil barang yang terkait dengan nik pengguna saat ini
        $barang = Barang::where('nik', $nik_pengguna)->get();
    
        return view('barang.riwayat_lelang', compact('barang'));
    }
    



    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'nama_barang' => 'required',
        'kategori_barang' => 'required',
        'kota' => 'required',
        'provinsi'=> 'required',
        'harga_barang' => 'required',
        'deskripsi' => 'required',
        'kelipatan' => 'required',
        'tgl_publish' => 'required|date',
        'tgl_expired' => 'required|date',
        'foto_barang' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'foto_barang_depan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'foto_barang_belakang' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'foto_barang_kiri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'foto_barang_kanan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'status' => 'required',
    ]);

    try {
        $nik = auth()->user()->nik;

        // Simpan foto_barang ke dalam direktori 'public/storage/barang' dengan nama yang unik
        $url_foto_barang = $request->file('foto_barang')->storeAs('public/storage/barang', 'bloop_' . uniqid() . '.' . $request->file('foto_barang')->getClientOriginalExtension());

        // Simpan foto_barang_depan ke dalam direktori 'public/storage/barang' dengan nama yang unik
        $url_foto_barang_1 = $request->file('foto_barang_depan')->storeAs('public/storage/barang', 'bloop_' . uniqid() . '.' . $request->file('foto_barang_depan')->getClientOriginalExtension());

        // Simpan foto_barang_belakang ke dalam direktori 'public/storage/barang' dengan nama yang unik
        $url_foto_barang_2 = $request->file('foto_barang_belakang')->storeAs('public/storage/barang', 'bloop_' . uniqid() . '.' . $request->file('foto_barang_belakang')->getClientOriginalExtension());

        // Simpan foto_barang_kiri ke dalam direktori 'public/storage/barang' dengan nama yang unik
        $url_foto_barang_3 = $request->file('foto_barang_kiri')->storeAs('public/storage/barang', 'bloop_' . uniqid() . '.' . $request->file('foto_barang_kiri')->getClientOriginalExtension());

        // Simpan foto_barang_kanan ke dalam direktori 'public/storage/barang' dengan nama yang unik
        $url_foto_barang_4 = $request->file('foto_barang_kanan')->storeAs('public/storage/barang', 'bloop_' . uniqid() . '.' . $request->file('foto_barang_kanan')->getClientOriginalExtension());

        // Simpan data barang ke dalam database dengan nama file yang unik
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'kota'=> $request->kota,
            'provinsi'=> $request->provinsi,
            'harga_barang' => $request->harga_barang,
            'deskripsi' => $request->deskripsi,
            'deskripsi_barang' => $request->deskripsi_barang,
            'kelipatan' => $request->kelipatan,
            'tgl_publish' => $request->tgl_publish,
            'tgl_expired' => $request->tgl_expired,
            'foto_barang' => basename($url_foto_barang),
            'foto_barang_depan' => basename($url_foto_barang_1),
            'foto_barang_belakang' => basename($url_foto_barang_2),
            'foto_barang_kiri' => basename($url_foto_barang_3),
            'foto_barang_kanan' => basename($url_foto_barang_4),
            'status' => $request->status,
            'nik' => $nik,
            // Tambahkan field lainnya sesuai kebutuhan...
        ]);

        return redirect('/upload_barang')->with('success', 'Barang Sedang Diproses, harap tunggu');
    } catch (\Exception $th) {
        return redirect('/upload_barang')->with('gagal', 'Barang gagal ditambahkan');
    }
}







}
