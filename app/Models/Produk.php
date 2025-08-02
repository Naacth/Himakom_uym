<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'price', 'quality_guaranteed', 'periodic_support', 'support_24_7', 'features', 'qris_image', 'whatsapp_link'
    ];

    protected $casts = [
        'quality_guaranteed' => 'boolean',
        'periodic_support' => 'boolean',
        'support_24_7' => 'boolean',
    ];

    /**
     * Get the orders for this product.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return $this->price ? 'Rp ' . number_format($this->price, 0, ',', '.') : 'Gratis';
    }

    /**
     * Get QRIS URL
     */
    public function getQrisUrlAttribute()
    {
        return $this->qris_image ? asset('storage/' . $this->qris_image) : null;
    }
}
