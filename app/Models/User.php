<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'city',
        'state',
        'phone',
        'zip',
        'image',
        'gender',
        'address',
        'about_me',
        'fcm_token',
        'long',
        'lat',
        'location',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'user_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function vendorReviews()
    {
        return $this->hasMany(VendorReview::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
