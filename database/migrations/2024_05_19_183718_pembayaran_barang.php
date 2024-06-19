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
        Schema::create('pembayaran_barang', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('foto_transfer');
            $table->string('status_pembayaran');
            $table->unsignedBigInteger('id_barang');
            $table->string('nik'); // Menggunakan tipe data yang sama dengan tabel 'users'
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('nik')->references('nik')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_barang');
    }
};
