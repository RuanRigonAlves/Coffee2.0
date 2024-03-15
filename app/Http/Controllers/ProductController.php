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

        $products = Product::filterAndSort($productName, $categories, $sort, $order);
        $products->appends($request->all());

        return view('products.index', [
            'products' => $products,
            'categoriesFilter' => $categoriesFilter,
            'sort' => $sortView,
            'selectedCategories' => $categories,
        ]);
    }

    public function show(Request $request, $productId)
    {
        $product = Product::getProductWithReviews($productId);

        return view('products.showProduct', ['product' => $product]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:40',
            'price' => 'required|integer|max:9999',
            'category' => 'required|string|max:255|in:Dessert,Food,Drink',
            'description' => 'required|string|max:255',
            'product_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if (!$request->hasFile('product_image')) {
            return back()->with('error', 'Something went wrong');
        }

        $path = $request->file('product_image')->store('public/product_images');
        $validatedData['product_image'] = str_replace('public/', '', $path);

        $product = Product::create($validatedData);

        return redirect()->back()->with('success', 'Product added successfully');
    }
}
