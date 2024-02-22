<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = [];
        $productName = $request->input("product");
        $categories = $request->input("category");
        $sort = $request->input("sort");
        $order = $request->input("order");


        $query = Product::query();

        if (!empty($productName)) {
            $query->where('name', 'like', '%' . $productName . '%');
        }

        if (!empty($categories)) {
            $query->where(function ($q) use ($categories) {
                foreach ($categories as $category) {
                    $q->orWhere('category', $category);
                }
            });
        }


        if (!empty($sort)) {
            if ($sort == "price") {
                $query->orderBy("price", $order);
            } elseif ($sort == "alphabetical") {
                $query->orderBy("name", $order);
            } elseif ($sort == "rating") {
                $query->orderBy("rating", $order);
            }
        }

        $products = $query->get();

        // dd(count($products));

        return view('products.index', ['products' => $products]);
    }

    public function show(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);


        return view('products.showProduct', ['product' => $product]);
    }
}
