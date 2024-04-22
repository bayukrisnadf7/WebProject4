<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'name', 'nik', 'email', 'email', 'alamat', 'no_hp', 'status' ,'password'
    ];
}
