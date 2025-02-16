<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ukuran', function (Blueprint $table) {
            $table->dropUnique(['nama_ukuran']); // Hapus constraint unique lama
            $table->unique(['kategori_ukuran_id', 'nama_ukuran']); // Tambahkan composite unique
        });
    }

    public function down()
    {
        Schema::table('ukuran', function (Blueprint $table) {
            $table->dropUnique(['kategori_ukuran_id', 'nama_ukuran']); // Hapus composite unique
            $table->unique('nama_ukuran'); // Kembalikan constraint unique lama
        });
    }
};
