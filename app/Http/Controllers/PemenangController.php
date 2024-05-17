<?php

namespace App\Http\Controllers;

use App\Models\BidBarang;
use Illuminate\Http\Request;

class PemenangController extends Controller
{
    public function index($id_barang)
{
    $list_pelelang = BidBarang::where('id_barang', $id_barang)->get();

    if ($list_pelelang->isEmpty()) {
        // Handle case where no records are found for the given $id_barang
        return redirect()->route('notfound'); // Redirect to a 404 or error page
    }

    return view('barang.pemenang_lelang', compact('list_pelelang'));
}
}
