@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="c-btn c-btn--outline" aria-disabled="true">&laquo; Prev</span>
        @else
            <a class="c-btn c-btn--outline" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Prev</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="c-btn c-btn--outline" href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="c-btn c-btn--outline" aria-disabled="true">Next &raquo;</span>
        @endif
    </nav>
@endif
