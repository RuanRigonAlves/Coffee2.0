<ul class="flex flex-wrap gap-2 h-4/5 overflow-auto">
    @forelse ($products as $product)
        <li class="w-64 h-80 mb-5 bg-neutral-700 rounded border border-black flex">
            <a href="{{ route('products.show', $product->id) }}" class="size-full">
                <div class="size-full flex flex-col justify-evenly text-xl">
                    <p class="flex justify-center ">{{ $product->name }}</p>

                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="" class="size-64">

                    <div class="flex justify-around">
                        <div class="flex items-center">
                            <span class="text-green-400">
                                <x-icons.dollar />
                            </span>
                            <span>
                                {{ $product->price }}
                            </span>
                        </div>

                        <div class="flex items-center">
                            <span class="text-yellow-500">
                                <x-icons.star />
                            </span>
                            <span>
                                {{ $product->rating }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </li>

    @empty
        <div>No Products</div>
    @endforelse

</ul>
