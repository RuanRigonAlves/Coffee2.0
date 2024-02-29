@extends('layouts.app')

@section('title', 'Cart')


@section('content')

    @foreach ($cart as $cartProduct)
        <div>
            <p>{{ $cartProduct->quantity }}</p>
        </div>
    @endforeach ()


@endsection
