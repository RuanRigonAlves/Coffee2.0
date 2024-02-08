@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <ul class="grid grid-cols-4 gap-2">

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


@endsection
