<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_id',
        'cart_id'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function addProduct(Product $product, $quantity, $cartId)
    {
        static::create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'cart_id' => $cartId
        ]);
    }

    protected static function getCartProduct($cartProductId)
    {
        return static::where('id', $cartProductId)->first();
    }


    protected static function updateQuantity($cartProduct, $quantity)
    {
        $cartProduct->quantity = $quantity;
        $cartProduct->save();
    }

    protected static function removeFromCart($cartProduct)
    {
        $cartProduct->delete();
    }
}
