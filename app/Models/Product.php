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
        "description",
        "rating",
        "product_image"
    ];


    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    private function averageRating()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    public function updateAverageRating()
    {
        $averageRating = $this->averageRating();
        $this->rating = $averageRating;
        $this->save();
    }

    protected static function filterAndSort($productName, $categories, $sort, $order)
    {
        $query = self::query();

        if (!empty($productName)) {
            $query->where('name', 'like', '%' . $productName . '%');
        }

        if (!empty($categories)) {
            $query->where(function ($q) use ($categories) {
                foreach ($categories as $category) {
                    $q->orWhere('category', $category);
                }
            });
        }

        if (!empty($sort)) {
            $sortField = match ($sort) {
                'alphabetical' => 'name',
                'price' => 'price',
                'rating' => 'rating',
                default => null,
            };

            if ($sortField !== null) {
                $query->orderBy($sortField, $order);
            }
        }

        return $query->paginate(12);
    }

    protected static function getProductWithReviews($productId)
    {
        return Product::with('reviews')->findOrFail($productId);
    }
}
