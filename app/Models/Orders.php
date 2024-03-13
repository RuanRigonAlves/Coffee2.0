<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'products_ordered'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getUserOrders($user)
    {
        $products = [];

        $orders = Orders::where('user_id', $user->id)->latest()->get();


        foreach ($orders as $order) {
            $products_ordered = unserialize($order->products_ordered);
            if (!$products_ordered) {
                return $products;
            }
            foreach ($products_ordered as $product_ordered) {
                $product = Product::find($product_ordered->product_id);
                if ($product) {
                    $product->quantity = $product_ordered->quantity;
                    $products[] = $product;
                }
            }
        }

        return $products;
    }

    public static function makeUserOrder($user)
    {
        $user->load('cart.cart_products');
        $cartId = $user->cart->id;
        $order = $user->cart->cart_products;

        if (!$order) {
            return false;
        }

        $serializeOrder = serialize($order);

        $data = [
            'user_id' => $user->id,
            'products_ordered' => $serializeOrder,
        ];

        static::create($data);

        CartProducts::where('cart_id', $cartId)->delete();

        return true;
    }
}
