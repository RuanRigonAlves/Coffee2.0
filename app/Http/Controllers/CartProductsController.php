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
        $data =  $this->validateQuanitity($request);

        $userId = auth()->id();

        $cart = Cart::getOrCreateCart($userId);

        CartProducts::addProduct($product, $data['quantity'], $cart->id);

        return redirect()->route('products.show', $product)->with(
            'success',
            $data['quantity'] . ' ' . $product->name . ' added to the cart!'
        );
    }

    public function update(Request $request)
    {
        $cartProductId = $request->input('cart_product_id');

        $validatedData = $this->validateQuanitity($request);

        $quantity = $validatedData['quantity'];

        $cartProduct = CartProducts::getCartProduct($cartProductId);

        if (!$cartProduct) {
            return back()->with('error', 'No product found in the database');
        }

        CartProducts::updateQuantity($cartProduct, $quantity);

        return back()->with('success', 'Product quantity updated');
    }

    public function destroy(Request $request)
    {
        $cartProductId = $request->input('product_to_remove');

        $cartProduct = CartProducts::getCartProduct($cartProductId);

        if (!$cartProduct) {
            return back()->with('error', 'No product found in the database');
        }

        CartProducts::removeFromCart($cartProduct);

        return back()->with('success', 'Product Removed From Cart');
    }

    protected function validateQuanitity(Request $request)
    {
        return $request->validate([
            'quantity' => 'required|min:1|max:20|integer',
        ]);
    }
}
