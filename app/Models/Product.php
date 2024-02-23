<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "category",
        "rating",
        "product_image"
    ];


    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
