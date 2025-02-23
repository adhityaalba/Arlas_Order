<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ukuran', function (Blueprint $table) {
            $table->integer('harga')->unsigned()->after('nama_ukuran'); // Menambahkan kolom harga
        });
    }

    public function down()
    {
        Schema::table('ukuran', function (Blueprint $table) {
            $table->dropColumn('harga'); // Menghapus kolom harga jika rollback
        });
    }
};
