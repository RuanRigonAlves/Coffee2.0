@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2 h-5/6">
        <section class="w-52 p-1 border-r border-slate-500">

            <x-product-list.category-form :categoriesFilter="$categoriesFilter" :selectedCategories="$selectedCategories" />

        </section>

        <section>
            <x-product-list.sort-product :sort="$sort" :products="$products" />

            {{ $products->links('pagination::simple-tailwind') }}

            <x-product-list.products-list :products="$products" />
        </section>
    </div>


@endsection
