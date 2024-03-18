@extends('layouts.app')

@section('title', 'My Orders')

@section('head')
    <script src="{{ asset('js/order-toggle.js') }}"></script>
@endsection

@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif

    <section class="h-full">
        <h2 class="text-2xl text-center mb-2">My Orders</h2>

        <x-my-orders.ordered :orders="$orders" />

    </section>

@endsection
