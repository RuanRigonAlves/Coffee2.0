<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function cart_products()
    {
        return $this->hasMany(CartProducts::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getCartWithProductsByUser($user)
    {
        return $user->cart()->with('cart_products.product')->first();
    }

    public static function totalCartValue($cartProducts)
    {
        $totalValue = 0;

        foreach ($cartProducts as $cartProduct) {
            if ($cartProduct->product && $cartProduct->quantity) {
                $totalValue += $cartProduct->product->price * $cartProduct->quantity;
            }
        }
        return $totalValue;
    }

    public static function getOrCreateCart($userId)
    {
        return static::firstOrCreate(['user_id' => $userId]);
    }
}
