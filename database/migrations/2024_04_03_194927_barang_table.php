<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function(Blueprint $table){
            $table->id();
            $table->string('nama_barang');
            $table->string('kategori_barang');
            $table->string('harga_barang');
            $table->string('kelipatan');
            $table->dateTime('tgl_publish');
            $table->dateTime('tgl_expired');
            $table->string('foto_barang');
            $table->string('status');
            $table->bigInteger('nik');
            $table->foreign('nik')->references('nik')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
