<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $fillable = [
        'uses',
        'name',
        'description',
        'page_name',
        'sub_name',
        'item_1',
        'description_1',
        'item_2',
        'description_2',
        'item_3',
        'description_3',
        'item_4',
        'description_4',
        'item_5',
        'description_5',
        'images',
        'video',
        'count_1',
        'count_2',
        'count_3'
    ];
}
