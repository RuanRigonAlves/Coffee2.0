<div>
    <h2 class="text-2xl mb-4 text-center">Reviews</h2>
    @foreach ($product->reviews as $review)
        <div class="pb-5">
            <p class="pb-1">{{ $review->user_name }}</p>
            <p>Rating: {{ $review->rating }}</p>
            <p>{{ $review->review }}</p>
        </div>
    @endforeach
</div>
