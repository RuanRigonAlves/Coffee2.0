<div class="mb-4">
    @auth
        <h2 class="text-2xl mb-2 text-center">Make a review</h2>

        <div>
            <form method="POST" action="{{ route('products.reviews.store', $product) }}" class="flex flex-col w-fill">
                @csrf

                <label for="review" class="mb-4">{{ Auth()->user()->name }}</label>

                <select name="rating" id="rating" required class="bg-gray-600 w-fit  mb-2">
                    <option value="" class="bg-gray-600">Select a Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option class="bg-gray-600" value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="grid grid-cols-10 gap-1">
                    <textarea name="review" id="review" required cols="" rows="2"
                        class="bg-gray-600 border-2 border-black rounded col-span-9" minlength="4"></textarea>

                    <button type="submit" class="btn">Add Review</button>
                </div>
            </form>
        </div>
    @else
        <p><a href="{{ route('login.index') }}" class="btn">Login to make a review</a></p>

    @endauth
</div>
