@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2">
        <div class="w-60 bg-gray-500">
            <div>
                <form method="GET" action="{{ route('products.index') }}" class="flex">
                    <input type="text" name="product" placeholder="search">
                    <button type="submit" class="">
                        @include('icons.search-icon')
                    </button>
                </form>
            </div>
            <div>
                <h3>Category</h3>
                <form method="GET" action="" class="flex">

                </form>
            </div>
        </div>
        <div>
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
        </div>
    </div>

@endsection
