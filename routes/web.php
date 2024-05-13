<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [BarangController::class, 'index']);
Route::get('/detail_barang/{id}', [BarangController::class, 'show']);
Route::post('/upload_barang', [BarangController::class, 'store'])->middleware('auth');
Route::get('/upload_barang', [BarangController::class, 'index2'])->middleware('auth');

Route::get('/login', [LoginController:: class, 'index'])->middleware('guest');
Route::post('/login', [LoginController:: class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/lupa_password', [LupaPasswordController::class, 'index']);
// Route::get('/lupa_password', [LupaPasswordController::class, 'update']);

Route::get('/kategori_barang', [KategoriController::class, 'index']);
Route::post('/kategori_barang', [KategoriController::class, 'store']);

Route::get('/nopang', [PageController::class, 'index']);
Route::get('/masuk', [PageController::class, 'index2']);
Route::get('/daftar', [PageController::class, 'index3']);
Route::get('/lupa_sandi', [PageController::class, 'lupa']);
Route::get('/detail_lelang', [PageController::class, 'detail']);
Route::get('/kategori_barang', [PageController::class, 'kategori']);
