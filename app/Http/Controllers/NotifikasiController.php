<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use Carbon\Carbon;

class NotifikasiController extends Controller
{
    public function index(){
        $user = Auth::user();
        $notifkasi = Notifikasi::all();
        return view('notifikasi.index',[
            'notifikasi' => $notifkasi
        ]);
    }
    public function detil(){
        $user = Auth::user();
        $notifkasi = Notifikasi::where('nik', $user->nik)->get();
        $barang = Barang::all();
        return view('notifikasi.detil',compact('barang'),[
            'notifikasi' => $notifkasi
        ]);
    }
}
