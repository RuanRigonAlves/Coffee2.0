@extends('layouts.app')
@php
    $productName = $product->name;
@endphp

@section('title', $productName)

@section('content')

    <section class="p-2">
        <x-product-show.product-info :product="$product" />
    </section>
    <section class="px-2">

        <x-product-show.review-form :product="$product" />

        <x-product-show.reviews-list :product="$product" />
    </section>

@endsection
