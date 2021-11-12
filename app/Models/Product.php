<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'SKU',
        'short_description',
        'description',
        'weight',
        'colors',
        'dimensions',
        'price',
        'sales_price',
        'stuck_status',
        'featured',
        'qauntity',
        'image',
        'category_id',
    ];
}

