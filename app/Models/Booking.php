<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define fillable fields
    protected $fillable = [
        'user_id',
        'vendor_id',
        'availability_id',
        'date',
        'time_slot',
        'note',
        'status',
        'service_id',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    // Relationship with Availability
    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
