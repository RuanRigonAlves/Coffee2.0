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
        $sort = $request->input("sort", '');

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
                $query->orderBy("price");
            } elseif ($sort == "alphabetical") {
                $query->orderBy("name");
            }
        }

        $products = $query->get();


        return view('products.index', ['products' => $products]);
    }
}
