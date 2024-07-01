<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama_barang', 'kategori_barang' , 'kota' , 'provinsi', 'harga_barang', 'deskripsi' ,'kelipatan' , 'tgl_publish', 'tgl_expired', 'foto_barang','foto_barang_depan', 'foto_barang_belakang', 'foto_barang_kiri', 'foto_barang_kanan', 'status','nik'
    ];
    public function user()
    {
        return $this->belongsTo(Register::class, 'nik', 'nik');
    }
    public function pengajuanLelang()
    {
        return $this->hasMany(PengajuanLelang::class, 'nik', 'nik');
    }
    public function bids()
    {
        return $this->hasMany(BidBarang::class, 'id_barang', 'id_barang');
    }
    public function pembayaran(){
        return $this->hasMany(PembayaranBarang::class, 'id_barang', 'id_barang');
    }
    public static function checkAndUpdateStatus()
    {
        $today = Carbon::today();
        $barangList = self::where('status', '!=', 'Closed')->get();

        foreach ($barangList as $barang) {
            if (Carbon::parse($barang->tgl_expired)->lt($today)) {
                $barang->status = 'Closed';
                $barang->save();
            }
        }
    }
}
