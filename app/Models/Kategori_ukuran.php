<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_ukuran extends Model
{
    use HasFactory;

    protected $table = 'kategori_ukuran'; // Nama tabel tanpa "s"
    protected $guarded = [];

    public function ukuran()
    {
        return $this->hasMany(Ukuran::class, 'kategori_ukuran_id');
    }
}
