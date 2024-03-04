@extends('layouts.app')

@section('title', 'Cart')


@section('content')

    <section class="grid grid-cols-3">
        @foreach ($cartProducts as $cartProduct)
            <div class="mb-4 flex gap-4 p-2">
                <div class="relative">
                    <h2 class="absolute w-full text-center">{{ $cartProduct->product->name }}</h2>

                    <img src="{{ $cartProduct->product->product_image }}" class="w-40">
                </div>

                <div class="flex flex-col gap-3">
                    <p>Quantity: {{ $cartProduct->quantity }}</p>

                    <p>Total: {{ $cartProduct->product->price * $cartProduct->quantity }}</p>
                </div>
            </div>
        @endforeach ()
    </section>


@endsection
