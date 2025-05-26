<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'subtotal',
        'shipping_cost',
        'grand_total',
        'status',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'zip',
        'address',
        'company_name',
        'company_address',
        'order_notes',
        'shippingCost',
        'grandTotal',
        'vendor_id',
        'orderId',
        'dispute_reason',
        'dispute_detail'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_id'); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function payments(){
        return $this->hasOne(Payment::class);
    }
    
}
