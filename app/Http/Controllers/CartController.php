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

        $cart = $user->cart()->with('cart_products')->first();

        $cartProducts = $cart->cart_products;

        // dd($cartProducts);

        return view('cartView.index', ['cart' => $cartProducts]);
    }
}
