<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class CartProductsController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $data =  $request->validate([
            'quantity' => 'required|min:1|max:20|integer'
        ]);

        $userId = auth()->id();

        $cart = Cart::firstOrCreate(['user_id' => $userId]);


        $cartProductData = [
            'quantity' => $data['quantity'],
            'product_id' => $product->id,
            'cart_id' => $cart->id,
        ];

        CartProducts::create($cartProductData);

        return redirect()->route('products.show', $product)->with(
            'success',
            $data['quantity'] . ' ' . $product->name . ' added to the cart!'
        );
    }

    public function update(Request $request)
    {
        $cartProductId = $request->input('cart_product_id');

        $validatedData = $request->validate([
            'quantity' => 'required|min:1|max:20|integer'
        ]);

        $quantity = $validatedData['quantity'];

        $cartProduct = CartProducts::where('id', $cartProductId)->first();
        if ($cartProduct) {
            $cartProduct->quantity = $quantity;
            $cartProduct->save();

            return back()->with('success', 'Product quantity updated');
        }
    }

    public function destroy(Request $request)
    {
        $cartProductId = $request->input('product_to_remove');


        $cartProduct = CartProducts::where('id', $cartProductId)->first();
        if ($cartProduct) {
            $cartProduct->delete();

            return back()->with('success', 'Product Removed From Cart');
        }
    }
}
