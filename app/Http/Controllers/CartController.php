<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cart = $user->cart()->with('cart_products.product')->first();

        $cartProducts = optional($cart)->cart_products ?? collect();


        $totalValue = Cart::totalCartValue($cartProducts);

        return view('cartView.index', [
            'cartProducts' => $cartProducts,
            'totalValue' => $totalValue,
        ]);
    }
}
