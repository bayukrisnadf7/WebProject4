<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    protected $table = 'notifikasi'; // Nama tabel
    public static function getDaysDifference()
    {
        $dates = DB::table('notifikasi')->pluck('waktu'); // Mengambil semua tanggal dari kolom 'tanggal'
        $differences = [];

        foreach ($dates as $date) {
            $selisih_hari = DB::selectOne('SELECT DATEDIFF(CURDATE(), ?) AS selisih_hari', [$date])->selisih_hari;
            $differences[] = ['waktu' => $date, 'selisih_hari' => $selisih_hari];
        }

        return $differences;
    }
}
