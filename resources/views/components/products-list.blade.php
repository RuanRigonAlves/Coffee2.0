<ul class="flex flex-wrap justify-around gap-2 h-5/6 overflow-auto">
    @forelse ($products as $product)
        <li class="w-80 mb-5 bg-gray-500 rounded border border-black">
            <a href="{{ route('products.show', $product->id) }}">
                <p class="flex justify-center">{{ $product->name }}</p>
                <img src="{{ $product->product_image }}" alt="">
                <div class="flex justify-around">
                    <p>Price: {{ $product->price }}</p>
                    <p>Rating: {{ $product->rating }}</p>
                </div>
            </a>
        </li>

    @empty
        <div>No Products</div>
    @endforelse

</ul>
