@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <div class="flex gap-2 h-5/6">
        <section class="w-52 p-1 border-r border-slate-500">
            <x-forms.category-form :categoriesFilter="$categoriesFilter" />
        </section>

        <section>
            <x-sorts.sort-product :sort="$sort" :products="$products" />

            <x-products-list :products="$products" />
        </section>
    </div>

@endsection
