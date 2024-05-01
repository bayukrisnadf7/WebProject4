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
    $barang = Barang::all(); 
    return view('barang.index', compact('barang'));
    }
    public function index2()
    {
        return view('barang.upload');
    }
    public function show($id)
    {
        $detail_barang = Barang::find($id);

        $bid_barang = BidBarang::with('user') // Eager load relasi user
            ->where('id_barang', $id)
            ->orderBy('harga_bid', 'desc')
            ->take(3)
            ->get();

        return view('barang.detail', compact('detail_barang', 'bid_barang'));
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
        'harga_barang' => 'required',
        'kelipatan' => 'required',
        'tgl_publish' => 'required',
        'tgl_expired' => 'required',
        'foto_barang' => 'required|image',
        'status' => 'required',
    ]);

    try {
        if ($request->hasFile('foto_barang')) {
            // Simpan file ke dalam direktori 'storage/barang'
            $nama_file = $request->file('foto_barang')->storeAs('public/barang', $request->file('foto_barang')->getClientOriginalName());

            // Dapatkan URL file yang disimpan
            $url_file = $request->file('foto_barang')->getClientOriginalName();

            $nik = auth()->user()->nik;
            // Simpan nama file ke dalam database
            Barang::create([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => $request->kategori_barang,
                'harga_barang' => $request->harga_barang,
                'kelipatan' => $request->kelipatan,
                'tgl_publish' => $request->tgl_publish,
                'tgl_expired' => $request->tgl_expired,
                'foto_barang' => $url_file,  // Simpan URL file di database
                'status' => $request->status,
                'nik' => $nik,
                // Field lainnya...
            ]);

            return redirect('/')->with('success', 'Barang berhasil ditambahkan');
        }
    } catch (\Exception $th) {
        return redirect('/upload_barang')->with('gagal', 'Barang gagal ditambahkan');
    }
}






}
