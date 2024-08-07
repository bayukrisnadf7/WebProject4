<?php

namespace App\Http\Controllers;

use App\Models\BidBarang;
use Illuminate\Http\Request;


class BidBarangController extends Controller
{
    public function store (Request $request){
        $validate = $request->validate([
            'harga_bid' => 'required',
            'waktu_bid' => 'required',
            'id_barang' => 'required',
            'status' => 'required',
            'nik' => 'required'
        ]);
        if(BidBarang::create($validate)){
            return back()->with('successBid', 'Sukses mengikuti lelang');
        }
        return back()->with('loginError', 'Bid Failed!');
    }
}
