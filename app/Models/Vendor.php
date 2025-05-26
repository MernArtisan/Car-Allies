<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'location',
        'lat',
        'long',
        'establish_since',
        'description',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(VendorReview::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

}
