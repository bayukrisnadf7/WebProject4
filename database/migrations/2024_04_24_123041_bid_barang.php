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
            $table->unsignedBigInteger('id_barang'); // Menggunakan unsignedBigInteger untuk foreign key
            $table->unsignedBigInteger('id_user'); // Menggunakan unsignedBigInteger untuk foreign key
            $table->foreign('id_barang')->references('id')->on('barang'); // Menggunakan 'id' sebagai foreign key, bukan 'id_barang'
            $table->foreign('id_user')->references('id')->on('users'); // Menggunakan 'id' sebagai foreign key, bukan 'id_user'
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
