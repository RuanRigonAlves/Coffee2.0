@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

    @if (session('success'))
        <div>
            <x-flash-messages.success />
        </div>
    @endif

    <section class="flex justify-center">
        <form method="POST" action="{{ route('product.create') }}" class="w-80 flex flex-col gap-4"
            enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="bg-stone-700">
            </div>

            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="bg-stone-700">
            </div>

            <div>
                <h2>Category</h2>
                <input type="radio" name="category" id="dessert" value="Dessert">
                <label for="dessert">Dessert</label>

                <input type="radio" name="category" id="food" value="Food">
                <label for="food">Food</label>

                <input type="radio" name="category" id="drink" value="Drink">
                <label for="drink">Drink</label>
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="bg-stone-700">
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="product_image" id="image">
            </div>

            <button type="submit" class="btn-2">Add Product</button>
        </form>
    </section>

@endsection
