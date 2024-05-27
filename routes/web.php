<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatLelangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PemenangController;
use App\Http\Controllers\PengajuanLelangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Models\BidBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Auth;

// main utama
Route::get('/', [BarangController::class, 'index']);

// kategori
Route::get('/kategori/elektronik', [BarangController::class, 'kategoriElektronik']);
Route::get('/kategori/aksesoris', [BarangController::class, 'kategoriAksesoris']);
Route::get('/kategori/hobi&koleksi', [BarangController::class, 'kategoriHobi_Koleksi']);
Route::get('/kategori/gadget', [BarangController::class, 'kategoriGadget']);
Route::get('/kategori/otomotif', [BarangController::class, 'kategoriOtomotif']);

// detail barang
Route::get('/detail_barang/{id_barang}', [BarangController::class, 'show'])->middleware('auth');
Route::post('/submit_bid/{id_barang}', [BidBarangController::class, 'store'])->name('submit_bid');

// pengajuan upload barang
Route::post('/upload_barang', [BarangController::class, 'store'])->middleware('auth');
Route::get('/upload_barang', [BarangController::class, 'index2'])->middleware('auth');

// Riwayat lelang
Route::get('riwayat_lelang', [RiwayatLelangController::class, 'index']);

// cek auth
Route::get('/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
});


// notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index']);


Route::get('/riwayat_bid', [BarangController::class, 'showHistoryBid']);
Route::get('/riwayat_lelang_barang', [BarangController::class, 'showRiwayatLelangBarang']);

// login dan logout
Route::get('/login', [LoginController:: class, 'index'])->middleware('guest');
Route::post('/login', [LoginController:: class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// forgot password
Route::get('forget-password', [LupaPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [LupaPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [LupaPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [LupaPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// register
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

// pengajuan menjadi lelang
Route::get('/pengajuan', [PengajuanLelangController::class, 'show']);
Route::post('/pengajuan', [PengajuanLelangController::class, 'insertDataPengajuan']);

// halaman admin
Route::get('/halaman_admin', [AdminController::class, 'index']);
Route::get('/pengajuan_lelang', [AdminController::class, 'pengajuanLelang']);
Route::get('/seleksi_pengajuan/{id_pengajuan}', [AdminController::class, 'seleksiPengajuan']);
Route::post('/terima_pengajuan/{id_pengajuan}', [AdminController::class, 'terimaPengajuan'])->name('terima.pengajuan');
Route::post('/tolak_pengajuan/{id_pengajuan}', [AdminController::class, 'tolakPengajuan'])->name('tolak.pengajuan');

// pengajuan barang
Route::get('/pengajuan_barang', [AdminController::class, 'showPengajuanBarang']);
Route::get('/seleksi_pengajuan_barang/{id_barang}', [AdminController::class, 'seleksiPengajuanBarang']);
Route::post('/terima_pengajuan_barang/{id_barang}', [AdminController::class, 'terimaPengajuanBarang'])->name('terima.pengajuan.barang');
Route::post('/tolak_pengajuan_barang/{id_barang}', [AdminController::class, 'tolakPengajuanBarang'])->name('tolak.pengajuan.barang');

// profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile_data_pribadi', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile_data_akun', [ProfileController::class, 'updateAccount'])->name('profile.updateAccount');

// pilih pemenang
Route::get('/pilih_pemenang/{id_barang}', [PemenangController::class, 'index']);
Route::post('/pemenang_lelang_barang/{nik}/{id_barang}', [PemenangController::class, 'pemenangLelangBarang'])->name('pemenang.lelang.barang');
Route::post('/tolak_lelang_barang/{nik}/{id_barang}', [PemenangController::class, 'tolakLelangBarang'])->name('tolak.lelang.barang');

// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('pembayaran/{id_barang}', [TransaksiController::class, 'showPembayaranBarang']);
Route::post('pembayaran/{id_barang}', [TransaksiController::class, 'pembayaranBarang']);
Route::get('/lihat_pembayaran/{id_pembayaran}', [BarangController::class, 'buktiPembayaran']);
Route::post('/pembayaran_diterima/{id_pembayaran}', [TransaksiController::class, 'pembayaranDiterima'])->name('pembayaran.diterima');
Route::post('/pembayaran_ditolak/{id_pembayaran}', [TransaksiController::class, 'pembayaranDitolak'])->name('pembayaran.ditolak');



// pembayaran
// Route::get('/pembayaran/{id_barang}', [PemenangController::class, 'show'])->name('pembayaran.show');

