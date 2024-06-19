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
        Schema::create('pengajuan_lelang', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->string('bank');
            $table->string('no_rek');
            $table->string('foto_muka');
            $table->string('status');
            $table->string('nik'); // Menggunakan tipe data yang sama dengan tabel 'users'
            $table->foreign('nik')->references('nik')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_lelang');
    }
};
