@extends('layouts.app')

@section('title', 'Orders')

@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif


    <ul class="flex justify-evenly py-2 my-2">
        <li>
            <a href="{{ route('orders.pendingOrders') }}" class="btn">Pending</a>
        </li>

        <li>
            <a href="{{ route('orders.acceptedOrders') }}" class="btn">Accepted</a>
        </li>

        <li>
            <a href="{{ route('orders.completedOrders') }}" class="btn">Completed</a>
        </li>
    </ul>

    @yield('page_headline')

    @yield('order_page')

@endsection
