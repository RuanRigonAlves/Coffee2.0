@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-2 my-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class=" btn w-32 text-center">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn w-32 text-center">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span></span>
        @endif
    </nav>
@endif
