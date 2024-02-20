@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2">
        <section class="w-60 bg-gray-400">
            <div>
                <form method="GET" action="{{ route('products.index') }}" class="flex">
                    <input type="text" name="product" placeholder="search" value="{{ request('product') }}">
            </div>
            <div>
                <h3>Category</h3>
                <div>
                    <input type="checkbox" name="category[]" id="food" value="food"<?php echo isset($_GET['filter']) && in_array('food', $_GET['filter']) ? 'checked' : ''; ?>>
                    <label for="food">Food</label>
                </div>

                <div>
                    <input type="checkbox" name="category[]" id="drink" value="drink">
                    <label for="drink">Drink</label>
                </div>

                <div>
                    <input type="checkbox" name="category[]" id="dessert" value="dessert">
                    <label for="dessert">Dessert</label>
                </div>

                <div>
                    <button class="btn w-40 ">Search</button>
                </div>
                </form>
            </div>
        </section>

        <section>

            <div>
                @php
                    $sort = [
                        'price' => 'Price',
                        'alphabetical' => 'Alphabetical',
                    ];
                @endphp

                <ul class=" flex bg-gray-400 mb-4 py-4">
                    <li>
                        <p>Sort by:</p>
                    </li>

                    @foreach ($sort as $key => $label)
                        <li class="price-sort ml-4 ">
                            <a href="{{ route('products.index', [...request()->query(), 'sort' => $key]) }}">{{ $label }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>

            <ul class="grid grid-cols-3 gap-2">
                @forelse ($products as $product)
                    <li class="w-80 mb-5 bg-green-100">
                        <p class="block">{{ $product->name }}</p>
                        <img src="{{ $product->product_image }}" alt="">
                        <div>

                        </div>
                    </li>

                @empty
                    <div>No Products</div>
                @endforelse

            </ul>
        </section>
    </div>

@endsection
