<div class="flex gap-5 items-center mb-2 justify-end pr-3">
    <p class="text-xl">Cart Total: ${{ $totalValue }}</p>
    @if (!is_null($cartProducts) && count($cartProducts) > 0)
        <form method="POST" action="{{ route('order.store') }}" class="mb-0">
            @csrf
            <button type="submit" class="btn-2">Order</button>
        </form>
    @endif
</div>
