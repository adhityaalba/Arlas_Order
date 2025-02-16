<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_ukuran_id')->constrained('kategori_ukuran')->onDelete('cascade'); // Relasi ke kategori_ukuran
            $table->string('nama_ukuran')->unique(); // Pastikan nama ukuran unik
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ukuran');
    }
};
