@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <section class="py-1">
        @if (session('success'))
            <x-flash-messages.success />
        @endif

        <x-product-show.product-info :product="$product" />
    </section>
    <section>

        <x-product-show.review-form :product="$product" />

        <x-product-show.reviews-list :product="$product" />
    </section>

@endsection
