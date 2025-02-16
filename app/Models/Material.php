<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $table = 'material';

    protected $fillable = [
        'name', // Nama bahan
        'price', // Harga bahan
    ];

    // Casting untuk kolom tertentu (opsional)
    protected $casts = [
        'price' => 'decimal:2', // Pastikan harga disimpan sebagai desimal
    ];
}
