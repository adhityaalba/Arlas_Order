<?php

namespace Database\Seeders;

use App\Models\ModelJersey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelJerseysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('model_jerseys')->insert([
            ['id' => 1, 'nama_model' => 'Atasan', 'harga' => 10000],
            ['id' => 2, 'nama_model' => 'Setelan', 'harga' => 10000],

        ]);
    }
}
