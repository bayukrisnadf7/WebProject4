<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang', 'kategori_barang' , 'harga_barang','kelipatan' , 'tgl_publish', 'tgl_expired', 'durasi', 'foto_barang'
    ];
}
