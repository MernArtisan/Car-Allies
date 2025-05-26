<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['vendor_id', 'shipping_cost'];

    // Vendor relation
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
