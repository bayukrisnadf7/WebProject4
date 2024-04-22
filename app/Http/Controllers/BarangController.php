<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return view('barang.index',[
            'barang' => Barang::all()
        ]);
    }
    public function index2(){
        return view('barang.upload');
    }
    public function show($id){
        return view('barang.detail',[
            'detail_barang' => Barang::find($id)
        ]);
    }
    public function store(Request $request){
        $validate_barang = $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'tgl_publish' => 'required',
            'tgl_expired' => 'required',
            'foto_barang' => 'required',
        ]);
        try {
            Barang::create($validate_barang);
            return redirect('/barang')->with('success', 'Barang Berhasil ditambahkan');
        } catch (\Exception $th) {
            return redirect('/upload_barang')->with('gagal', 'Barang Gagal ditambahkan');
        }
        
    }
}
