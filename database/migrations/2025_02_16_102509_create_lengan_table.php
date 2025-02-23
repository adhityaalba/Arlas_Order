<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lengan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ukuran_id')->constrained('ukuran')->onDelete('cascade'); // Relasi ke ukuran
            $table->string('nama_lengan')->unique(); // Pastikan nama lengan unik
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lengan');
    }
};
