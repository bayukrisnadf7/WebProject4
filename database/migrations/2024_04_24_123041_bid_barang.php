<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bid_barang', function (Blueprint $table) {
            $table->id();
            $table->string('harga_bid');
            $table->unsignedBigInteger('id_barang');
            $table->string('nik'); // Menggunakan tipe data yang sama dengan tabel 'users'
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('nik')->references('nik')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
