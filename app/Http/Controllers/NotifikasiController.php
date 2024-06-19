<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index(){
        $user = Auth::user();
        $notifkasi = Notifikasi::where('nik', $user->nik)->orderBy('waktu', 'DESC')->get();
        return view('notifikasi.index',[
            'notifikasi' => $notifkasi
        ]);
    }
}
