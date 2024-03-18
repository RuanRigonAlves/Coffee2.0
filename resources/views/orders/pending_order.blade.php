@extends('layouts.admin_orders')

@section('title', 'Pending Orders')

@section('order_page')

@section('page_headline')

    <h2 class="text-3xl text-center">Pending page</h2>

@endsection

<div class="overflow-auto h-90 mt-1 pr-1">
    @foreach ($orders as $order)
        <div class="mb-2">
            <div class="flex justify-center gap-8 h-10 justify- items-center">
                <p class="w-64">Order: {{ $order->created_at }}</p>

                <form method="POST" action="{{ route('orders.pendingOrdersUpdate', ['order' => $order->id]) }}"
                    class="mb-0">
                    @csrf
                    {{-- @method('PUT') --}}

                    <label for="decline-{{ $order->id }}" class="btn">Decline</label>
                    <input type="radio" name="decision" id="decline-{{ $order->id }}" value="declined">


                    <label for="accept-{{ $order->id }}" class="btn">Accept</label>
                    <input type="radio" name="decision" id="accept-{{ $order->id }}" value="accepted">

                    <button type="submit" class="ml-4 btn-2">
                        Confirm
                    </button>
                </form>

                <button class="btn-2 js-btn" id="order-toggle-{{ $order->id }}">Show</button>
            </div>

            <div class="hidden border border-stone-500 p-2 rounded-xl" id="order-{{ $order->id }}">

                @foreach ($order->products as $product)
                    <div class="grid grid-cols-5 p-1 border border-stone-700 rounded-xl">
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
