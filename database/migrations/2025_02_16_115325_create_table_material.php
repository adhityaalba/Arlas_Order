<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->id(); // Kolom id (primary key)
            $table->string('name'); // Nama bahan
            $table->decimal('price', 10, 2); // Harga bahan (desimal dengan 2 digit di belakang koma)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('material');
    }
};
