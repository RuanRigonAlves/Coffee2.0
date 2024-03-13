@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

    @if (session('success'))
        <x-flash-messages.success />
    @endif

    <x-my-orders.ordered :products="$products" />

@endsection
