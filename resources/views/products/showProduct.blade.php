@extends('layouts.app')
@php
    $productName = $product->name;
@endphp

@section('title', $productName)

@section('content')

    <section class="grid2 grid-cols-2 gap-4 p-2">
        <div class="relative flex justify-center">
            <h1 class="absolute top-1 left-0 right-0 text-center text-4xl">
                {{ $product->category }}
            </h1>

            <img class="rounded" src="{{ $product->product_image }}" alt="">
        </div>

        <div>
            <h1 class="text-4xl text-center mb-3">{{ $product->name }}</h1>

            <p class="text-lg">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut pariatur ratione commodi atque corporis totam
                aut inventore incidunt, dicta ducimus ullam omnis iusto eaque neque officia quia fugiat harum laborum!
                Distinctio praesentium eius quo quidem fugit expedita dolor, in ipsa? Distinctio magni exercitationem quos.
                Nihil delectus veritatis recusandae nobis! Reiciendis beatae sapiente commodi inventore saepe provident!
                Officiis voluptates aperiam tempore.
                Hic alias quos nesciunt laudantium nihil vitae fugiat voluptatibus officiis, quibusdam, eligendi laborum
                officia corporis, quae iusto quod. Vitae reiciendis sapiente, adipisci et rem numquam vel accusantium
                exercitationem doloremque fugit.
                Dolorum, iste! Quisquam debitis eum accusamus dolor nulla, omnis deleniti aperiam nostrum sed sit! Neque,
                fuga necessitatibus iste facere iure quisquam numquam labore aspernatur quod harum vero quos illum tenetur!
                Necessitatibus explicabo corporis ratione vel omnis veniam. Sunt debitis, nobis porro possimus mollitia
                libero maxime voluptate repellat. Quam, ducimus necessitatibus, veniam voluptates nemo delectus vitae dolor
                eligendi, temporibus nihil optio.
            </p>
        </div>

        <div class="col-span-2">

        </div>

        <div class="col-span-2">

            @auth

                <h2 class="text-2xl mb-4 text-center">Make a review</h2>

                <form method="POST" action="{{ route('products.reviews.store', $product) }}">
                    @csrf

                    <label for="review">Review</label>

                    <textarea name="review" id="review" required cols="80" rows="3"
                        class="bg-gray-600 border-2 border-black rounded"></textarea>
                    <select name="rating" id="rating" required class="bg-gray-600">
                        <option value="" class="bg-gray-600">Select a Rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option class="bg-gray-600" value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    <button type="submit" class="btn">Add Review</button>
                </form>
            @else
                <p><a href="{{ route('login.index') }}" class="btn">Login to make a review</a></p>

            @endauth


        </div>

        <div class="col-span-2">
            <h2 class="text-2xl mb-4 text-center">Reviews</h2>
            @foreach ($product->reviews as $review)
                <div class="pb-5">
                    <p class="pb-1">{{ $review->user_name }}</p>
                    <p>Rating: {{ $review->rating }}</p>
                    <p>{{ $review->review }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
