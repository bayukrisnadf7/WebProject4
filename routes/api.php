<?php

use App\Http\Controllers\BarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('getBarangAPI', [BarangController::class, 'getBarangAPI']);
Route::get('getBarangDetailAPI/{id_barang}', [BarangController::class, 'getBarangDetailAPI']);
