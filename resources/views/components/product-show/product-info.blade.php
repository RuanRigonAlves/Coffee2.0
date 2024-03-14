@section('head')
    <script src="{{ asset('js/product-show.js') }}"></script>
@endsection

<di>
    <div class="grid2 grid-cols-3 gap-4 justify-items-start h-96">

        <div class="relative flex justify-center w-96 h-96">
            <h1 class="absolute top-1 left-0 right-0 text-center text-4xl ">
                {{ $product->category }}
            </h1>

            <img class="rounded size-full" src="{{ asset('storage/' . $product->product_image) }}" alt="">
        </div>


        <div class="grid grid-rows-3 gap-3 col-span-2 w-full pr-2">
            <div class="row-span-2">
                <h1 class="text-4xl text-center mb-3">{{ $product->name }}</h1>

                <p class="text-lg">
                    {{ $product->description }}
                </p>
            </div>

            <div class="flex justify-between text-xl flex-wrap">
                <div class="flex flex-col justify-evenly">
                    <p class="">Price: <span id="product-price">{{ $product->price }}</span></p>
                    <p>Rating: {{ $product->rating }}</p>
                </div>

                <div class="flex flex-col justify-evenly ">
                    @if (auth()->check())
                        <form method="POST" action="{{ route('cart_product.store', $product) }}" class="mb-0">
                            @csrf
                            <label for="quantity">Quantity:</label>
                            <input class="bg-transparent border rounded text-center" type="number" name="quantity"
                                id="quantity" value="1" min="1" max="20">

                            <button type="submit" class="btn-2 inline">Add To Cart</button>
                        </form>

                        <div>
                            <p>Total: <span id="total-price">{{ $product->price }}</span></p>
                        </div>
                    @else
                        <a href="{{ route('login.index') }}" class="btn">Login to Order</a>
                    @endif
                </div>
            </div>
        </div>

    </div>

</di>
