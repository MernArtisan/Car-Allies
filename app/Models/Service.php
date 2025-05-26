<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id', 'name', 'type', 'status', 'price', 'image','description'];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
