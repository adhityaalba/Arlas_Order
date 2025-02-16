<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategori_ukuran', function (Blueprint $table) {
            $table->dropColumn('harga'); // Menghapus kolom harga
        });
    }

    public function down(): void
    {
        Schema::table('kategori_ukuran', function (Blueprint $table) {
            $table->integer('harga')->unsigned()->after('nama_kategori'); // Menambahkan kembali kolom harga jika rollback
        });
    }
};
