<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PengajuanLelangController;
use App\Models\BidBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

Route::get('/', [BarangController::class, 'index']);

Route::get('/detail_barang/{id}', [BarangController::class, 'show']);
Route::post('/submit_bid/{id}', [BidBarangController::class, 'store'])->name('submit_bid');

Route::post('/upload_barang', [BarangController::class, 'store']);
Route::get('/upload_barang', [BarangController::class, 'index2']);

// notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index']);
Route::get('/riwayat_bid', [BarangController::class, 'showHistoryBid']);
Route::get('/riwayat_lelang', [BarangController::class, 'showRiwayatLelang']);

Route::get('/login', [LoginController:: class, 'index'])->middleware('guest');
Route::post('/login', [LoginController:: class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// forgot password
Route::get('/lupa-password', [LupaPasswordController::class, 'index'])->name('lupa.password');
Route::post('/lupa-password', [LupaPasswordController::class, 'lupaPassword'])->name('lupa.password');
Route::get('/reset-password/{token}', [LupaPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [LupaPasswordController::class, 'resetPassword'])->name('reset.password.post');

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

// Route::get('/lupa_password', [LupaPasswordController::class, 'index']);
// Route::get('/lupa_password', [LupaPasswordController::class, 'update']);

Route::get('/kategori_barang', [KategoriController::class, 'index']);
Route::post('/kategori_barang', [KategoriController::class, 'store']);

// pengajuan menjadi lelang
Route::get('/pengajuan', [PengajuanLelangController::class, 'show']);
Route::post('/pengajuan', [PengajuanLelangController::class, 'insertDataPengajuan']);

// halaman admin
Route::get('/halaman_admin', [AdminController::class, 'index']);
Route::get('/pengajuan_lelang', [AdminController::class, 'pengajuanLelang']);
Route::get('/seleksi_pengajuan/{id_pengajuan}', [AdminController::class, 'seleksiPengajuan']);
Route::post('/terima_pengajuan/{id_pengajuan}', [AdminController::class, 'terimaPengajuan'])->name('terima.pengajuan');
Route::post('/tolak_pengajuan/{id_pengajuan}', [AdminController::class, 'tolakPengajuan'])->name('tolak.pengajuan');