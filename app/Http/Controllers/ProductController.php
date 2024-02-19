<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if (!empty($request)) {
            $productName = $request->input("product");

            $product = Product::where("name", "like", "%" . $productName . "%")->get();
        }

        return view('products.index', ['products' => $product]);
    }
}
