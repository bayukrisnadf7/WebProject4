<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){
        return view('kategori.index');
    }
    public function store(Request $request){
        $validate_data = $request->validate([
            'nama_kategori' => 'required'
        ]);
        Kategori::create($validate_data);
        return redirect('/upload_barang')->with('success', 'Kategori Berhasil ditambahkan');
    }
}
