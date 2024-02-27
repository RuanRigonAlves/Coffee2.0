<div class="mb-4">
    @auth
        <h2 class="text-2xl mb-2 text-center">Make a review</h2>

        <form method="POST" action="{{ route('products.reviews.store', $product) }}" class="flex flex-col w-fit">
            @csrf

            <label for="review" class="mb-4">{{ Auth()->user()->name }}</label>

            <select name="rating" id="rating" required class="bg-gray-600 w-fit  mb-2">
                <option value="" class="bg-gray-600">Select a Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option class="bg-gray-600" value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>

            <textarea name="review" id="review" required cols="50" rows="3"
                class="bg-gray-600 border-2 border-black rounded mb-2"></textarea>

            <button type="submit" class="btn">Add Review</button>
        </form>
    @else
        <p><a href="{{ route('login.index') }}" class="btn">Login to make a review</a></p>

    @endauth
</div>
