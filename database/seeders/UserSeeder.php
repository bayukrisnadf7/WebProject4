<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
            'name'=> 'Bayu Krisna',
            'nik'=> '3509202606030003',
            'no_hp'=> '0895399757207',
            'alamat'=> 'Jember',
            'email' => 'bayukrisna14658@gmail.com',
            'status' => '1',
            'password' => Hash::make('123456789')
        ],);
        DB::table('users')->insert([
            'name'=> 'Dania Angga',
            'nik'=> '3509202606030004',
            'no_hp'=> '0895399757208',
            'alamat'=> 'Jember',
            'email' => 'bayukrisna231@gmail.com',
            'status' => '2',
            'password' => Hash::make('123456789')
        ]);
    }
}
