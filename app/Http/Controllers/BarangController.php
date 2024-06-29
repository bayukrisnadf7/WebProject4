<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PembayaranBarang;
use App\Models\BidBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;


class BarangController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('status', 'Open')
            ->where('tgl_expired', '>=', $currentDate)
            ->get();
        return view('home.home', compact('barang'));
    }
    public function kategoriElektronik()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('kategori_barang', 'Elektronik')->where('status', 'Open')->where('tgl_expired', '>=', $currentDate)->get();
        return view('home.elektronik', compact('barang'));
    }
    public function kategoriAksesoris()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('kategori_barang', 'Aksesoris')->where('status', 'Open')->where('tgl_expired', '>=', $currentDate)->get();
        return view('home.aksesoris', compact('barang'));
    }
    public function kategoriHobi_Koleksi()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('kategori_barang', 'Hobi & Koleksi')->where('status', 'Open')->where('tgl_expired', '>=', $currentDate)->get();
        return view('home.hobi', compact('barang'));
    }
    public function kategoriGadget()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('kategori_barang', 'Gadget')->where('status', 'Open')->where('tgl_expired', '>=', $currentDate)->get();
        return view('home.gadget', compact('barang'));
    }
    public function kategoriOtomotif()
    {
        $currentDate = Carbon::now(); // Mengambil tanggal saat ini
        $barang = Barang::where('kategori_barang', 'Otomotif')->where('status', 'Open')->where('tgl_expired', '>=', $currentDate)->get();
        return view('home.otomotif', compact('barang'));
    }
    public function getBarangAPI()
    {
        $barang = Barang::where('status', 'Open')->where('status', 'Open')->get();
        return Response::json($barang, 200);
    }
    public function getBarangDetailAPI($id_barang)
    {
        $detail_barang = Barang::find($id_barang);
        return Response::json($detail_barang, 200);
    }
    public function searchBarang(Request $request)
    {
        $keyword = $request->input('keyword');
        $barang = Barang::where('nama_barang', 'LIKE', "%{$keyword}%")->where('status', 'Open')->get();

        return view('home.home', compact('barang', 'keyword'));
    }
    public function updateStatus()
    {
        Barang::checkAndUpdateStatus();
        return redirect()->back()->with('status', 'Barang statuses have been updated.');
    }
    public function index2()
    {
        return view('barang.upload');
    }
    public function index3()
    {
        return view('home.home');
    }
    public function show($id_barang)
    {
        $detail_barang = Barang::find($id_barang);
        $nikPemilik = $detail_barang->nik;
        $namaPemilik = $detail_barang->user->nama;


        $lelang_tertinggi = BidBarang::with('user') // Eager load relasi user
            ->where('id_barang', $id_barang)
            ->orderBy('harga_bid', 'desc')
            ->first();

        return view('barang.detail', compact('detail_barang', 'lelang_tertinggi', 'namaPemilik', 'nikPemilik'));
    }

    public function showHistoryBid()
    {
        // Mendapatkan informasi pengguna yang sedang diautentikasi
        $user = Auth::user();

        // Mengambil riwayat bid berdasarkan nik pengguna yang sedang diautentikasi
        $riwayat_bid = BidBarang::where('nik', $user->nik)->get();

        return view('barang.history', ['riwayat_bid' => $riwayat_bid]);
    }

    public function showRiwayatLelangBarang()
    {
        // Mengambil nik pengguna yang saat ini diautentikasi
        $nik_pengguna = auth()->user()->nik;

        // Mengambil barang yang terkait dengan nik pengguna saat ini
        $barang = Barang::with(['pembayaran', 'bids'])->where('nik', $nik_pengguna)->get();

        // Retrieve id_pembayaran and corresponding pembayaran for each barang
        $statusBidByBarang = [];
        $idPembayaranByBarang = [];
        $buktiPembayaranByBarang = [];
        foreach ($barang as $item) {
            $statusBid = BidBarang::where('id_barang', $item->id_barang)->pluck('status');
            $statusBidByBarang[$item->id_barang] = $statusBid;
            $idPembayaran = PembayaranBarang::where('id_barang', $item->id_barang)->value('id_pembayaran');
            $idPembayaranByBarang[$item->id_barang] = $idPembayaran;
            $buktiPembayaran = PembayaranBarang::find($idPembayaran);
            $buktiPembayaranByBarang[$item->id_barang] = $buktiPembayaran;
        }

        return view('barang.riwayat_lelang_barang', compact('barang', 'idPembayaranByBarang', 'buktiPembayaranByBarang', 'statusBidByBarang'));
    }
    public function buktiPembayaran($id_pembayaran)
    {
        $buktiPembayaran = PembayaranBarang::where('id_pembayaran', $id_pembayaran)->first();

        return view('barang.bukti_pembayaran', compact('buktiPembayaran'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
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

            function storeFile($file, $path)
            {
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($path), $imageName);
                return $path . '/' . $imageName;
            }

            // Store files in the directory and get the path
            $url_foto_barang = storeFile($request->file('foto_barang'), 'img/storage/barang');
            $url_foto_barang_depan = storeFile($request->file('foto_barang_depan'), 'img/storage/barang');
            $url_foto_barang_belakang = storeFile($request->file('foto_barang_belakang'), 'img/storage/barang');
            $url_foto_barang_kiri = storeFile($request->file('foto_barang_kiri'), 'img/storage/barang');
            $url_foto_barang_kanan = storeFile($request->file('foto_barang_kanan'), 'img/storage/barang');

            // Save the data to the database
            Barang::create([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => $request->kategori_barang,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'harga_barang' => $request->harga_barang,
                'deskripsi' => $request->deskripsi,
                'kelipatan' => $request->kelipatan,
                'tgl_publish' => $request->tgl_publish,
                'tgl_expired' => $request->tgl_expired,
                'foto_barang' => $url_foto_barang,
                'foto_barang_depan' => $url_foto_barang_depan,
                'foto_barang_belakang' => $url_foto_barang_belakang,
                'foto_barang_kiri' => $url_foto_barang_kiri,
                'foto_barang_kanan' => $url_foto_barang_kanan,
                'status' => $request->status,
                'nik' => $nik,
                // Tambahkan field lainnya sesuai kebutuhan...
            ]);
            return redirect('/upload_barang')->with('successPengajuanBarang', 'Pengajuan barang anda sedang diproses. Silahkan cek notifikasi untuk melihat barang anda!');
        } catch (\Exception $th) {
            return redirect('/upload_barang')->with('gagalPengajuanBarang', 'Pengajuan barang anda ditolak. Silahkan isi data barang dengan benar!');
        }
    }
}
