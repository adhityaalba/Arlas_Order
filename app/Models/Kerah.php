<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerah extends Model
{
    protected $guarded = [];

    public function sub_kerah()
    {
        $this->hasMany(SubKerah::class);
    }
}
