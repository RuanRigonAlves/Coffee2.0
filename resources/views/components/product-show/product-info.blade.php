@section('head')
    <script src="{{ asset('js/product-show.js') }}"></script>
@endsection

<div class="grid2 grid-cols-2 gap-4 mb-8">

    <div class="relative flex justify-center">
        <h1 class="absolute top-1 left-0 right-0 text-center text-4xl">
            {{ $product->category }}
        </h1>

        <img class="rounded" src="{{ $product->product_image }}" alt="">
    </div>


    <div class="grid grid-rows-3 gap-3">
        <div class="row-span-2">
            <h1 class="text-4xl text-center mb-3">{{ $product->name }}</h1>

            <p class="text-lg">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut pariatur ratione commodi atque corporis
                totam
                aut inventore incidunt, dicta ducimus ullam omnis iusto eaque neque officia quia fugiat harum laborum!
                Distinctio praesentium eius quo quidem fugit expedita dolor, in ipsa? Distinctio magni exercitationem
                quos.
                Nihil delectus veritatis recusandae nobis! Reiciendis beatae sapiente commodi inventore saepe provident!
                Officiis voluptates aperiam tempore.
                Hic alias quos nesciunt laudantium nihil vitae fugiat voluptatibus officiis, quibusdam, eligendi laborum
                officia corporis, quae iusto quod. Vitae reiciendis sapiente, adipisci et rem numquam vel accusantium
                exercitationem doloremque fugit.
            </p>
        </div>

        <div class="flex justify-between text-xl">
            <div class="flex flex-col justify-evenly">
                <p class="">Price: <span id="product-price">{{ $product->price }}</span></p>
                <p>Rating: {{ $product->rating }}</p>
            </div>

            <div class="flex flex-col justify-evenly">
                @if (auth()->check())
                    <form method="POST" action="{{ route('cart_product.store', $product) }}" class="mb-0">
                        @csrf
                        <label for="quantity">Quantity:</label>
                        <input class="bg-transparent border rounded text-center" type="number" name="quantity"
                            id="quantity" value="1" min="1" max="20">

                        <button type="submit" class="btn-2">Order</button>
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
