<?php

namespace App\Http\Controllers;

use App\Models\Cartorders;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = Orders::getUserOrders($user);

        return view("orders.order_index", [
            "orders" => $orders
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

    public function adminOrders()
    {
        $user = auth()->user()->is_admin;

        return view('layouts.admin_orders');
    }

    public function pendingOrdersPage()
    {
        $user = auth()->user()->is_admin;

        $orders = Orders::getOrders('pending');

        return view('orders.pending_order', [
            'orders' => $orders
        ]);
    }

    public function acceptedOrdersPage()
    {
        $user = auth()->user()->is_admin;

        $orders = Orders::getOrders('accepted');

        return view('orders.accepted_order', [
            'orders' => $orders
        ]);
    }

    public function completedOrdersPage()
    {
        $user = auth()->user()->is_admin;

        $orders = Orders::getCompletedOrders();

        return view('orders.completed_order', [
            'orders' => $orders
        ]);
    }

    public function pendingOrdersUpdate(Request $request, Orders $order)
    {
        $user = auth()->user()->is_admin;

        $decision = $request->decision;

        Orders::updateOrder($decision, $order);

        return redirect()->route('orders.pendingOrders')->with('success', 'Orderd Updated');
    }

    public function acceptedOrdersUpdate(Request $request, Orders $order)
    {
        $user = auth()->user()->is_admin;

        $decision = $request->decision;

        Orders::updateOrder($decision, $order);

        return redirect()->route('orders.acceptedOrders')->with('success', 'Orderd Updated');
    }
}
