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
        Schema::create('sub_kerahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kerah_id')->constrained('kerahs')->cascadeOnDelete();
            $table->string('jenis_kerah');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kerahs');
    }
};
