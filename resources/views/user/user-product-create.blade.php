@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

    @if (session('success'))
        <div>
            <x-flash-messages.success />
        </div>
    @endif

    <section class="flex justify-center">
        <form method="POST" action="{{ route('product.create') }}" class="w-80 flex flex-col gap-4 text-lg"
            enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="bg-stone-700" required maxlength="40">
            </div>

            <div>
                <label for="price">Product Price</label>
                <input type="number" name="price" id="price" class="bg-stone-700" required>
            </div>

            <div>
                <h2>Category</h2>
                <div class="flex justify-between">
                    <div>
                        <input type="radio" name="category" id="dessert" value="Dessert" class="size-4">
                        <label for="dessert">Dessert</label>
                    </div>

                    <div>
                        <input type="radio" name="category" id="food" value="Food" class="size-4">
                        <label for="food">Food</label>
                    </div>

                    <div>
                        <input type="radio" name="category" id="drink" value="Drink" class="size-4">
                        <label for="drink">Drink</label>
                    </div>
                </div>
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="bg-stone-700" required>
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="product_image" id="image" required>
            </div>

            <button type="submit" class="btn-2">Add Product</button>
        </form>
    </section>

@endsection
