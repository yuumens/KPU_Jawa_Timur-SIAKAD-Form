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
        Schema::create('users_form', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin'); // Tambahkan kolom jenis kelamin
            $table->bigInteger('nomor_hp')->unique();
            $table->string('email')->unique();
            $table->string('tingkat_satker'); // Tambahkan kolom tingkat satker (Kabupaten/Kota)
            $table->string('jabatan'); // Tambahkan kolom jabatan/posisi
            $table->string('photo')->nullable(); // Tambahkan kolom untuk menyimpan foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_form');
    }
};
