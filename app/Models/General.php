<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'office_email',
        'phone',
        'office_phone',
        'address',
        'location',
        'lat',
        'long',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
    ];
}
