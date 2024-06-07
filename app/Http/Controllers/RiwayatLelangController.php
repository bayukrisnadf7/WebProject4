<?php

namespace App\Http\Controllers;

use App\Models\BidBarang;
use Illuminate\Http\Request;

class RiwayatLelangController extends Controller
{
    public function index(){
        return view('riwayat_lelang.index',[
            $nik = auth()->user()->nik,
            $riwayat_lelang = BidBarang::with('barang')->where('nik', $nik)->orderBy('created_at', 'DESC')->get(),
        ], compact('riwayat_lelang'));
    }
}
