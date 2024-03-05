<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoriesFilter = [
            'food' => 'Food',
            'drink' => 'Drink',
            'dessert' => 'Dessert',
        ];

        $sortView = [
            'price' => 'Price',
            'alphabetical' => 'Alphabetical',
            'rating' => 'Rating',
        ];

        $productName = $request->input("product");
        $categories = $request->input("category");
        $sort = $request->input("sort");
        $order = $request->input("order");

        $products = [];
        $products = Product::filterAndSort($productName, $categories, $sort, $order);

        return view('products.index', [
            'products' => $products,
            'categoriesFilter' => $categoriesFilter,
            'sort' => $sortView,
            'selectedCategories' => $categories,
        ]);
    }

    public function show(Request $request, $productId)
    {
        $product = Product::with('reviews')->findOrFail($productId);

        // dd($product);

        return view('products.showProduct', ['product' => $product]);
    }
}
