<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Models\BidBarang;

Route::get('/', [BarangController::class, 'index']);

Route::get('/detail_barang/{id}', [BarangController::class, 'show']);
Route::post('/submit_bid/{id}', [BidBarangController::class, 'store'])->name('submit_bid');

Route::post('/upload_barang', [BarangController::class, 'store']);
Route::get('/upload_barang', [BarangController::class, 'index2']);

Route::get('/login', [LoginController:: class, 'index'])->middleware('guest');
Route::post('/login', [LoginController:: class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/lupa_password', [LupaPasswordController::class, 'index']);
// Route::get('/lupa_password', [LupaPasswordController::class, 'update']);

Route::get('/kategori_barang', [KategoriController::class, 'index']);
Route::post('/kategori_barang', [KategoriController::class, 'store']);
