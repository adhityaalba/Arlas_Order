<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lengan', function (Blueprint $table) {
            $table->decimal('harga', 10, 2)->after('id'); // 10 digit dengan 2 desimal
        });
    }

    public function down()
    {
        Schema::table('lengan', function (Blueprint $table) {
            $table->dropColumn('harga');
        });
    }
};
