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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('nama_order');
            $table->foreignId('material_id')->constrained('material')->onDelete('restrict');
            $table->foreignId('lengan_id')->constrained('lengan')->onDelete('restrict');
            $table->foreignId('ukuran_id')->constrained('ukuran')->onDelete('restrict');
            $table->foreignId('kerah_id')->constrained();
            $table->foreignId('model_jersey_id')->constrained();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
