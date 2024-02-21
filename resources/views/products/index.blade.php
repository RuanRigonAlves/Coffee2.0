@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2 h-5/6">

        <section class="w-52 p-1 border-r border-slate-500">
            <div>
                <form method="GET" action="{{ route('products.index') }}" class="flex">
                    <input class="h-10 text-center rounded bg-slate-500" type="text" name="product" placeholder="search"
                        value="{{ request('product') }}">
            </div>

            <div>
                @php
                    $categoriesFilter = [
                        'food' => 'Food',
                        'drink' => 'Drink',
                        'dessert' => 'Dessert',
                    ];
                @endphp

                <h3 class= "text-xl">Category</h3>

                @foreach ($categoriesFilter as $key => $label)
                    <div class="flex items-center">
                        <input class="size-5 cursor-pointer" type="checkbox" name="category[]" id="{{ $key }}"
                            value="{{ $key }}"<?php echo isset($_GET['category']) && in_array('{{ $key }}', $_GET['category']) ? 'checked' : ''; ?>>
                        <label for="{{ $key }}"
                            class="text-lg w-24 cursor-pointer pl-1  border-effect">{{ $label }}</label>
                    </div>
                @endforeach

                <div class="mt-4">
                    <button type="submit" class="btn w-full">Search</button>
                </div>
                </form>
                <button class="mt-1 bg-slate-300 w-full rounded"><a href="{{ route('products.index') }}">Clear</a></button>
            </div>
        </section>

        <section>
            <div class="flex justify-around items-center ">
                @php
                    $sort = [
                        'price' => 'Price',
                        'alphabetical' => 'Alphabetical',
                        'rating' => 'Rating',
                    ];
                @endphp

                <ul class=" flex py-4 w-full">
                    <li>
                        <p>Sort by:</p>
                    </li>

                    @foreach ($sort as $key => $label)
                        <li class="mx-4 border-effect text-center">
                            @php
                                $currentSortOrder = request()->query('order', 'asc');
                                $newSortOrder = $currentSortOrder === 'asc' ? 'desc' : 'asc';

                                $isActive = request()->query('sort') === $key;

                                $sortOrderToUse = $isActive ? $newSortOrder : 'asc';
                            @endphp

                            <a class="p-2"
                                href="{{ route('products.index', array_merge(request()->query(), ['sort' => $key, 'order' => $sortOrderToUse])) }}">
                                {{ $label }} @if ($isActive)
                                    ({{ strtoupper($currentSortOrder) }})
                                @endif
                            </a>
                        </li>
                    @endforeach

                </ul>
                <p class="flex py-4 w-80 mr-1 text-sm justify-end">Products Found: <span>{{ count($products) }}</span>
                </p>
            </div>

            <ul class="flex flex-wrap justify-around gap-2 h-5/6 overflow-auto">
                @forelse ($products as $product)
                    <li class="w-80 mb-5 bg-gray-500 rounded border border-black">
                        <p class="flex justify-center">{{ $product->name }}</p>
                        <img src="{{ $product->product_image }}" alt="">
                        <div class="flex justify-around">
                            <p>Price: {{ $product->price }}</p>
                            <p>Rating: {{ $product->rating }}</p>
                        </div>
                    </li>

                @empty
                    <div>No Products</div>
                @endforelse

            </ul>
        </section>
    </div>

@endsection
