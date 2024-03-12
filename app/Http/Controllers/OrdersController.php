<?php

namespace App\Http\Controllers;

use App\Models\CartProducts;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = Orders::where("user_id", $user->id)->first();

        $products_ordered = unserialize($orders->products_ordered);

        return view("orders.order_index", ["orders" => $products_ordered]);
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

        return redirect()->back()->with('success', 'Ordered Successfully');
    }
}
