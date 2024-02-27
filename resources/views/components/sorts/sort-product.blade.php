<div class="flex justify-around items-center ">
    <ul class=" flex py-4 w-full">
        <li>
            <p>Sort by:</p>
        </li>
        @foreach ($sort as $key => $label)
            <li class="mx-4 border-effect text-center">
                @php
                    $currentSortOrder = request()->query('order', 'asc');
                    $newSortOrder = $currentSortOrder === 'asc' ? 'desc' : 'asc';

                    $isActive = request()->query('sort') === $key;

                    $sortOrderToUse = $isActive ? $newSortOrder : 'asc';
                @endphp

                <a class="p-2"
                    href="{{ route('products.index', array_merge(request()->query(), ['sort' => $key, 'order' => $sortOrderToUse])) }}">
                    {{ $label }} @if ($isActive)
                        ({{ strtoupper($currentSortOrder) }})
                    @endif
                </a>
            </li>
        @endforeach

    </ul>
    <p class="flex py-4 w-80 mr-1 text-sm justify-end">Products Found: <span>{{ count($products) }}</span>
    </p>
</div>
