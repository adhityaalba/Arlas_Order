<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->nama_customer = $order->customer->nama;
        });
    }

    // Relasi ke Material
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    // Relasi ke Kerah
    public function kerah(): BelongsTo
    {
        return $this->belongsTo(Kerah::class);
    }

    // Relasi ke Lengan
    public function lengan(): BelongsTo
    {
        return $this->belongsTo(Lengan::class);
    }

    // Relasi ke ModelJersey
    public function modelJersey(): BelongsTo
    {
        return $this->belongsTo(ModelJersey::class);
    }

    // Relasi ke Ukuran
    public function ukuran(): BelongsTo
    {
        return $this->belongsTo(Ukuran::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
