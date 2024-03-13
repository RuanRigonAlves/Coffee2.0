<div class="flex gap-5">
    <p class="text-xl">Cart Total : $ {{ $totalValue }}</p>
    @if (!is_null($cartProducts) && count($cartProducts) > 0)
        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <button type="submit" class="btn-2">Order</button>
        </form>
    @endif
</div>
