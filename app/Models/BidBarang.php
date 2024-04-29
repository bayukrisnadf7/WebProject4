<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidBarang extends Model
{
    protected $table = 'bid_barang';
    protected $fillable = [
        'harga_bid', 'id_barang' , 'nik'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}
