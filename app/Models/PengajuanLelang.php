<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLelang extends Model
{
    protected $table = 'pengajuan_lelang';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'bank', 'no_rek', 'scan_ktp', 'nik', 'status'
    ];
}
