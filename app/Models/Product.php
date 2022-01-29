<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product-name',
        'product-price',
        'product-description',
        'product-quantity',
        'product-image',
    ];

}
