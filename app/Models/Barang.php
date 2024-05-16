<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang', 'kategori_barang' , 'harga_barang','kelipatan' , 'tgl_publish', 'tgl_expired', 'foto_barang','foto_barang_depan', 'foto_barang_belakang', 'foto_barang_kiri', 'foto_barang_kanan', 'status', 'nik'
    ];
}
