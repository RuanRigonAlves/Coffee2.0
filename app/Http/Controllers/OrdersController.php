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

        $products = Orders::getUserOrders($user);

        return view("orders.order_index", [
            "products" => $products
        ]);
    }

    public function store()
    {
        $user = auth()->user();

        $order = Orders::makeUserOrder($user);

        if ($order == false) {
            return redirect()->back()->with('error', '');
        }

        return redirect()->route('order.index')->with('success', 'Ordered Successfully');
    }
}
