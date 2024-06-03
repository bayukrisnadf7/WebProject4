<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranBarang extends Model
{
    protected $table = 'pembayaran_barang';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
        'nama', 'foto_transfer', 'status_pembayaran','id_barang' ,'nik', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
