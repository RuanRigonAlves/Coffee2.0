@props(['categoriesFilter', 'selectedCategories'])

<div>
    <form method="GET" action="{{ route('products.index') }}" class="flex">
        <input class="h-8 text-center rounded bg-transparent border-2 border-gray-500 w-52" type="text" name="product"
            placeholder="Product Name" value="{{ request('product') }}">
</div>

<div>
    <h3 class= "text-xl">Category</h3>

    @foreach ($categoriesFilter as $key => $label)
        <div class="flex items-center">
            <input class="size-5 cursor-pointer" type="checkbox" name="category[]" id="{{ $key }}"
                value="{{ $key }}"
                {{ is_array($selectedCategories ?? null) && in_array($key, $selectedCategories) ? 'checked' : '' }}>

            <label for="{{ $key }}"
                class="text-lg w-24 cursor-pointer pl-1  border-effect">{{ $label }}</label>
        </div>
    @endforeach

    <div class="mt-4">
        <button type="submit" class="btn w-full">Apply</button>
    </div>

    </form>

    <button class="mt-1 btn w-full">
        <a href="{{ route('products.index') }}">Clear</a>
    </button>
</div>
