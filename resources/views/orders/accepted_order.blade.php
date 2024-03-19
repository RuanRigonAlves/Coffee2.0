@extends('layouts.admin_orders')

@section('title', 'Accepted Orders')

@section('order_page')

@section('page_headline')

    <h2 class="text-3xl text-center">Accepted page</h2>

@endsection

<div class="overflow-auto h-90 mt-1 pr-1">
    @foreach ($orders as $order)
        <div class="mb-2">
            <div class="flex justify-center gap-8 h-10 justify- items-center">
                <p class="w-64">Order: {{ $order->created_at }}</p>

                <form method="POST" action="{{ route('orders.acceptedOrdersUpdate', ['order' => $order->id]) }}"
                    class="mb-0">
                    @csrf
                    @method('PUT')

                    <label for="incomplete-{{ $order->id }}" class="btn">Incomplete</label>
                    <input type="radio" name="decision" id="incomplete-{{ $order->id }}" value="incomplete">


                    <label for="completed-{{ $order->id }}" class="btn">Completed</label>
                    <input type="radio" name="decision" id="completed-{{ $order->id }}" value="completed">

                    <button type="submit" class="ml-4 btn-2">
                        Confirm
                    </button>
                </form>

                <button class="btn-2 js-btn" id="order-toggle-{{ $order->id }}">Show</button>
            </div>

            <div class="hidden border border-stone-500 p-2 rounded-xl" id="order-{{ $order->id }}">

                @foreach ($order->products as $product)
                    <div class="grid grid-cols-5 p-1 mb-2 rounded-xl">
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
