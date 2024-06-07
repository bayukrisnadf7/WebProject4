<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'nik'; // Menetapkan 'nik' sebagai primary key

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_hp',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getIsAdminAttribute()
    {
        return $this->attributes['email'] === 'admin@gmail.com'; // Or any other condition to identify an admin
    }
}
