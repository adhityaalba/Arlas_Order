<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'nama' => 'John Doe',
            'telp' => '08123456789',
            'total_transaction' => 0,
            'alamat' => 'Jalan Merdeka No. 10',
        ]);
    }
}
