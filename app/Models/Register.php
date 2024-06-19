<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik','nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nohp' ,'foto', 'email', 'password', 'status'
    ];
    public function notifications()
    {
        return $this->hasMany(Notifikasi::class, 'nik', 'nik');
    }
}

