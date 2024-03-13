<?php

namespace App\Http\Controllers;

use App\Models\CartProducts;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = Orders::where("user_id", $user->id)->latest()->get();

        $products = [];

        foreach ($orders as $order) {
            $products_ordered = unserialize($order->products_ordered);
            if ($products_ordered) {
                foreach ($products_ordered as $orderedProduct) {
                    $product = Product::find($orderedProduct->product_id);
                    if ($product) {
                        $product->quantity = $orderedProduct->quantity;
                        $products[] = $product;
                    }
                }
            }
        }

        return view("orders.order_index", [
            "products" => $products
        ]);
    }

    public function store()
    {
        $user = auth()->user();

        $user->load('cart.cart_products');

        $cartId = $user->cart->id;

        $order = $user->cart->cart_products;

        if (empty($order)) {
            return redirect()->back()->with('error', '');
        }

        $serializedOrder = serialize($order);

        $data = [
            'user_id' => $user->id,
            'products_ordered' => $serializedOrder,
        ];

        Orders::create($data);

        CartProducts::where('cart_id', $cartId)->delete();

        return redirect()->route('order.index')->with('success', 'Ordered Successfully');
    }
}
