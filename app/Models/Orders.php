<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'products_ordered',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
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

    public static function getUserOrders($user)
    {
        $orders = Orders::where('user_id', $user->id)->latest()->get();

        $orders = static::unserializeOrder($orders);

        return $orders;
    }

    public static function getOrders($status)
    {
        $orders = Orders::where('status', $status)->oldest()->get();

        $orders = static::unserializeOrder($orders);

        // dd($orders);
        return $orders;
    }

    public static function getCompletedOrders()
    {
        $orders = Orders::where('status', 'completed')->latest()->get();

        $orders = static::unserializeOrder($orders);

        return $orders;
    }

    public static function unserializeOrder($orders)
    {

        foreach ($orders as $order) {
            $products_ordered = unserialize($order->products_ordered);

            if (!$products_ordered) {
                continue;
            }

            $products = [];

            foreach ($products_ordered as $product_ordered) {
                $product = Product::find($product_ordered->product_id);
                if ($product) {
                    $product->quantity = $product_ordered->quantity;
                    $products[] = $product;
                    $order['products'] = $products;
                }
            }
        }

        return $orders;
    }

    public static function updateOrder($decision, $order)
    {
        if ($order) {
            $order->update([
                'status' => $decision,
            ]);
        }
    }
}
