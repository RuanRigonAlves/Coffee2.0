<h2 class="text-2xl text-center my-2">My Cart</h2>

<div class="h-full overflow-auto mt-1 pr-1">
    @foreach ($cartProducts as $cartProduct)
        <div class="grid grid-cols-5 p-1 mb-4 border border-stone-700 rounded-xl">
            <div class="w-64">
                <img src="{{ asset('storage/' . $cartProduct->product->product_image) }}" class="w-full rounded-xl">
            </div>

            <div class="ml-2 flex flex-col gap-4 col-span-3">
                <p class="text-xl"> {{ $cartProduct->product->name }}</p>

                <p>
                    {{ $cartProduct->product->description }}
                </p>
            </div>

            <div class="flex flex-col gap-3 items-end justify-evenly">
                <form method="POST" action="{{ route('cart_product.update') }}"
                    id="quantityUpdateForm-{{ $cartProduct->id }}" class="m-0">
                    @csrf
                    <div>
                        <label id="quantityLabel">Quantity:</label>
                        <input type="number" name="quantity" id="quantityInput-{{ $cartProduct->id }}"
                            value="{{ $cartProduct->quantity }}" min="1" max="20"
                            class="bg-transparent w-12 btn-2 text-center">
                    </div>
                    <input type="hidden" name="cart_product_id" value="{{ $cartProduct->id }}">
                </form>

                <div class="text-lg">
                    <p>Total Price:
                        <span>
                            {{ $cartProduct->product->price * $cartProduct->quantity }}
                        </span>
                    </p>
                </div>

                <script>
                    document.getElementById("quantityInput-{{ $cartProduct->id }}").addEventListener('change', function() {
                        document.getElementById('quantityUpdateForm-{{ $cartProduct->id }}').submit();
                    });
                </script>


                <div>
                    <form method="POST" action="{{ route('cart_product.destroy') }}" class="m-0">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="product_to_remove" value="{{ $cartProduct->id }}">
                        <button type="submit" class="btn-2"> Remove</button>
                    </form>
                </div>
            </div>

        </div>
    @endforeach ()
</div>
