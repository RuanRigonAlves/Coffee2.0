<div class="overflow-auto h-90 mt-1 pr-1">
    @foreach ($products as $product)
        <div class="grid grid-cols-5 p-1 mb-4 border border-stone-700 rounded-xl">
            <div>
                <img src="{{ asset('storage/' . $product->product_image) }}" class="w-64 rounded-xl">
            </div>

            <div class="ml-2 flex flex-col gap-4 col-span-4">
                <p> {{ $product->name }}</p>

                <p>
                    {{ $product->description }}
                </p>
            </div>

        </div>
    @endforeach
</div>
