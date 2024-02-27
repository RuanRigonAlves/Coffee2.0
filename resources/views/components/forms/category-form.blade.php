<div>
    <form method="GET" action="{{ route('products.index') }}" class="flex">
        <input class="h-10 text-center rounded bg-slate-500" type="text" name="product" placeholder="search"
            value="{{ request('product') }}">
</div>

<div>
    <h3 class= "text-xl">Category</h3>

    @foreach ($categoriesFilter as $key => $label)
        <div class="flex items-center">
            <input class="size-5 cursor-pointer" type="checkbox" name="category[]" id="{{ $key }}"
                value="{{ $key }}"<?php echo isset($_GET['category']) && in_array('{{ $key }}', $_GET['category']) ? 'checked' : ''; ?>>
            <label for="{{ $key }}"
                class="text-lg w-24 cursor-pointer pl-1  border-effect">{{ $label }}</label>
        </div>
    @endforeach

    <div class="mt-4">
        <button type="submit" class="btn w-full">Search</button>
    </div>
    </form>
    <button class="mt-1 bg-slate-300 w-full rounded"><a href="{{ route('products.index') }}">Clear</a></button>
</div>
