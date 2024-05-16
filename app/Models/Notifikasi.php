<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Notifikasi extends Model
{
    protected $table = 'notifikasi'; // Nama tabel
    protected $fillable = [
        'pesan', 'waktu' ,'nik'
    ];
    public function getDaysDifference()
    {
        $date = $this->tanggal_notifikasi; // Kolom tanggal notifikasi
        $selisih_hari = DB::selectOne('SELECT DATEDIFF(CURDATE(), ?) AS selisih_hari', [$date])->selisih_hari;

        return $selisih_hari;
    }
}
