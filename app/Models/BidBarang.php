<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidBarang extends Model
{
    protected $table = 'bid_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'harga_bid', 'id_barang' , 'status' , 'nik'
    ];
    public function user()
    {
        return $this->belongsTo(Register::class, 'nik', 'nik');
    }
    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
    public function pembayaran()
    {
        return $this->hasOne(PembayaranBarang::class, 'id_barang', 'id_barang');
    }

}
