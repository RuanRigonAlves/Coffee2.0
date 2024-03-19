@extends('layouts.admin_orders')

@section('title', 'Complted Orders')

@section('order_page')

@section('page_headline')

    <h2 class="text-3xl text-center">Completed page</h2>

@endsection

<div class="overflow-auto h-90 mt-1 pr-1">
    @foreach ($orders as $order)
        <div class="mb-2">
            <div class="flex justify-center gap-8 h-10 justify- items-center">
                <p class="w-64">Order: {{ $order->created_at }}</p>

                <p class="flex text-center w-52">Status:
                    {{ $order->status }}
                    <span class="flex self-center mx-1">
                        @if ($order->status == 'pending')
                            <x-icons.circle fill="yellow" />
                        @elseif ($order->status == 'completed' || $order->status == 'accepted')
                            <x-icons.circle fill="green" />
                        @elseif ($order->status == 'incomplete' || $order->status == 'declined')
                            <x-icons.circle fill="red" />
                        @endif
                    </span>
                </p>

                <button class="btn-2 js-btn" id="order-toggle-{{ $order->id }}">Show</button>
            </div>

            <div class="hidden border border-stone-500 p-2 rounded-xl" id="order-{{ $order->id }}">

                @foreach ($order->products as $product)
                    <div class="grid grid-cols-5 p-1 rounded-xl mb-2">
                        <div>
                            <img src="{{ asset('storage/' . $product->product_image) }}" class="w-64 rounded-xl">
                        </div>

                        <div class="ml-2 flex flex-col gap-4 col-span-4">
                            <p> {{ $product->name }}</p>

                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    @endforeach
</div>


@endsection
