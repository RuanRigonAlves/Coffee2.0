@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2 h-full">
        <section class="w-52 border-slate-500 py-2">

            <x-product-list.category-form :categoriesFilter="$categoriesFilter" :selectedCategories="$selectedCategories" />

            {{-- <x-product-list.sort-product :sort="$sort" :products="$products" /> --}}


        </section>

        <section class="pl-2">
            <x-product-list.sort-product :sort="$sort" :products="$products" />

            {{-- {{ $products->links('pagination::simple-tailwind') }} --}}

            <x-product-list.products-list :products="$products" />
        </section>
    </div>


@endsection
