@extends('layouts.app')

@section('title', 'Cart')


@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif

    <section class="flex flex-col justify-between h-full gap-1">
        <x-cart.cart-products :cartProducts="$cartProducts" />

        <x-cart.cart-total :totalValue="$totalValue" :cartProducts="$cartProducts" />
    </section>

@endsection
