<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KerahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kerahs')->insert([
            ['id' => 1, 'kategori' => 'A', 'harga' => 0],
            ['id' => 2, 'kategori' => 'B', 'harga' => 10000],
            ['id' => 3, 'kategori' => 'C', 'harga' => 15000],
        ]);
    }
}
