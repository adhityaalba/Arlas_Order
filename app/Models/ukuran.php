<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ukuran extends Model
{
    use HasFactory;

    protected $table = 'ukuran';
    protected $guarded = [];


    public function kategoriUkuran()
    {
        return $this->belongsTo(Kategori_ukuran::class, 'kategori_ukuran_id');
    }
}
