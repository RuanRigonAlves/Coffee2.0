<div>
    @foreach ($products as $product)
        <div class="flex my-4">
            <div class="w-36">
                <img src="{{ $product->product_image }}">
            </div>

            <div class="flex flex-col ml-2">
                <div>
                    <h2 class="text-center">{{ $product->name }}</h2>
                </div>

                <div class="flex flex-col">
                    <p>Price:{{ $product->price }}</p>
                    <p>Quantity: {{ $product->quantity }}</p>
                    <p>Total: {{ $product->price * $product->quantity }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
