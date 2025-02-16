<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lengan', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu
            $table->dropForeign(['ukuran_id']);

            // Hapus kolom ukuran_id
            $table->dropColumn('ukuran_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lengan', function (Blueprint $table) {
            // Tambahkan kembali kolom ukuran_id jika rollback
            $table->foreignId('ukuran_id')->constrained()->onDelete('cascade');

            // Foreign key constraint akan otomatis ditambahkan kembali oleh Laravel
        });
    }
};
