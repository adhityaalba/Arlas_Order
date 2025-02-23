<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKerah extends Model
{
    protected $guarded = [];

    public function kerah()
    {
        return $this->belongsTo(Kerah::class);
    }
}
