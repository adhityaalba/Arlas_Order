<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKerahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_kerahs')->insert([
            'id' => 1,
            'kategori_id' => 1,
            'jenis_kerah' => 'Round Neck',
            'harga' => 0,
        ]);
    }
}
