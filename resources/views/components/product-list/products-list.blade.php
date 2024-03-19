<ul class="flex flex-wrap gap-2 h-4/5 overflow-auto">
    @forelse ($products as $product)
        <li class="w-60 h-80 mb-1 mx-1 flex product-bg-card rounded-2xl border-transparent">
            <a href="{{ route('products.show', $product->id) }}" class="size-full ">

                <div class="size-full flex flex-col justify-evenly text-xl p-2">
                    <div>
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt=""
                            class="size-60 rounded-xl">
                    </div>

                    <div class="">
                        <h3 class="text-center w-full h-8 text-ellipsis overflow-hidden ">
                            {{ $product->name }}
                        </h3>
                    </div>


                    <div class="flex justify-around">
                        <div class="flex items-center">
                            <span class="text-green-400">
                                <x-icons.dollar />
                            </span>
                            <span>
                                {{ $product->price }}
                            </span>
                        </div>

                        <div class="flex items-center h-8 ">
                            <span>
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
