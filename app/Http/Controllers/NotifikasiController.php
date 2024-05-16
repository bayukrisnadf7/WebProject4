<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
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
        return view('notifikasi.detil',[
            'notifikasi' => $notifkasi
        ]);
    }
}
