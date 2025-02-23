<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_ukuran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori')->unique(); // Pastikan nama kategori unik
            $table->integer('harga')->unsigned(); // Harga tidak boleh negatif
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_ukuran');
    }
};
