<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index', [
            'barang' => Barang::all()
        ]);
    }
    public function index2()
    {
        return view('barang.upload');
    }
    public function show($id)
    {
        return view('barang.detail', [
            'detail_barang' => Barang::find($id)
        ]);
    }

    public function store(Request $request)
    {

        // Simpan nama file dalam database
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga_barang' => 'required',
            'tgl_publish' => 'required',
            'tgl_expired' => 'required',
            'durasi' => 'required',
            'foto_barang' => 'required', // Validasi untuk file gambar
        ]);

        try {
            if ($request->hasFile('foto_barang')) {
                $file = $request->file('foto_barang');

                // Generate unique filename
                $nama_file = time() . '_' . $file->getClientOriginalName();

                // Store file in specified directory under storage/app/public/img/barang
                $path = $file->storeAs('public/img/barang', $nama_file);

                // Get public URL to access the stored file
                $url = Storage::url($path);

                // Now you can save the $url or $path to the database if needed
                // For example:
                Barang::create([
                    'nama_barang' => $request->nama_barang,
                    'kategori_barang' => $request->kategori_barang,
                    'harga_barang' => $request->harga_barang,
                    'tgl_publish' => $request->tgl_publish,
                    'tgl_expired' => $request->tgl_expired,
                    'durasi' => $request->durasi,
                    'foto_barang' => $nama_file,  // Save filename in database
                    // Other fields...
                ]);

                return redirect('/')->with('success', 'Barang berhasil ditambahkan');
            }
        } catch (\Exception $th) {
            return redirect('/upload_barang')->with('gagal', 'Barang gagal ditambahkan');
        }
    }
}
