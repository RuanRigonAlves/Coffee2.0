<ul class="flex flex-wrap gap-2 h-4/5 overflow-auto">
    @forelse ($products as $product)
        <li class="w-64 h-80 mb-5 bg-gray-500 rounded border border-black flex">
            <a href="{{ route('products.show', $product->id) }}" class="size-full">
                <div class="size-full flex flex-col justify-evenly">
                    <p class="flex justify-center">{{ $product->name }}</p>
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="" class="size-64">
                    <div class="flex justify-around">
                        <p>Price: {{ $product->price }}</p>
                        <p>Rating: {{ $product->rating }}</p>
                    </div>
                </div>
            </a>
        </li>

    @empty
        <div>No Products</div>
    @endforelse

</ul>
