<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'review', 'rating', 'product_id', 'user_id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(function ($review) {
            $review->product->updateAverageRating();
        });

        static::updated(function ($review) {
            $review->product->updateAverageRating();
        });

        static::deleted(function ($review) {
            $review->product->updateAverageRating();
        });
    }

    protected static function createReview($user, $product, $data)
    {
        $data['user_id'] = $user->id;
        $data['user_name'] = $user->name;

        $product->reviews()->create($data);
    }
}
