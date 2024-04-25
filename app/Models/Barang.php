<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_barang','nama_barang', 'kategori_barang' , 'harga_barang', 'tgl_publish', 'tgl_expired', 'durasi', 'foto_barang'
    ];
}
