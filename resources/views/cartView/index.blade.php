@extends('layouts.app')

@section('title', 'Cart')


@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif

    <x-cart.cart-total :totalValue="$totalValue" :cartProducts="$cartProducts" />

    <x-cart.cart-products :cartProducts="$cartProducts" />

@endsection
