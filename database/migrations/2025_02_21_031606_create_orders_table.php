<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('nama_order');
            $table->foreignId('material_id')->constrained('material');
            $table->foreignId('kerah_id')->constrained('kerahs');
            $table->foreignId('lengan_id')->constrained('lengan');
            $table->foreignId('model_jersey_id')->constrained('model_jerseys');
            $table->foreignId('ukuran_id')->constrained('ukuran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
