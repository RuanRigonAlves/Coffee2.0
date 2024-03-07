@extends('layouts.app')

@section('title', 'Cart')


@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif
    <section class="grid grid-cols-2">
        <div class="flex flex-col gap-3">
            @foreach ($cartProducts as $cartProduct)
                <div class="mb-4 flex gap-4 p-2">
                    <div class="relative">
                        <h2 class="absolute w-full text-center">{{ $cartProduct->product->name }}</h2>

                        <img src="{{ $cartProduct->product->product_image }}" class="w-40">
                    </div>


                    <form method="POST" action="{{ route('cart_product.update') }}"
                        id="quantityUpdateForm-{{ $cartProduct->id }}">
                        @csrf
                        <div>
                            <label id="quantityLabel">Quantity:</label>
                            <input type="number" name="quantity" id="quantityInput-{{ $cartProduct->id }}"
                                value="{{ $cartProduct->quantity }}" min="1" max="20"
                                class="bg-transparent w-12">
                        </div>
                        <input type="hidden" name="cart_product_id" value="{{ $cartProduct->id }}">
                    </form>

                    <script>
                        document.getElementById("quantityInput-{{ $cartProduct->id }}").addEventListener('change', function() {
                            document.getElementById('quantityUpdateForm-{{ $cartProduct->id }}').submit();
                        });
                    </script>

                    <div>
                        <p>
                            Total: {{ $cartProduct->product->price * $cartProduct->quantity }}
                        </p>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('cart_product.destroy') }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="product_to_remove" value="{{ $cartProduct->id }}">
                            <button type="submit" class="btn"> Remove</button>
                        </form>
                    </div>
                </div>
        </div>
        @endforeach ()
    </section>
    <div>
        <p>Cart Total: {{ $totalValue }}</p>
    </div>


@endsection
