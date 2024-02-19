<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if (!empty($request->input("product"))) {
            $productName = $request->input("product");

            $product = Product::where("name", "like", "%" . $productName . "%")->get();
        } else {
            $product = Product::all();
        }

        if (!empty($request->input("filter"))) {

            $filters = $request->input("filter");

            $filteredItems = [];

            foreach ($filters as $value) {
                $products = Product::where("category", "like", "%" . $value . "%")->get();

                foreach ($products as $product) {
                    $filteredItems[] = $product;
                }
            }

            $product = $filteredItems;
        }

        return view('products.index', ['products' => $product]);
    }
}
