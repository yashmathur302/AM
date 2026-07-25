@if ($paginator->hasPages())
    <nav aria-label="Pagination" class="flex gap-2">
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center rounded border border-navy-800 px-4 py-2 text-sm text-navy-800/40" aria-disabled="true">&laquo; Prev</span>
        @else
            <a class="inline-flex items-center rounded border border-navy-800 px-4 py-2 text-sm text-navy-800 hover:bg-navy-800 hover:text-white transition-colors" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Prev</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="inline-flex items-center rounded border border-navy-800 px-4 py-2 text-sm text-navy-800 hover:bg-navy-800 hover:text-white transition-colors" href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="inline-flex items-center rounded border border-navy-800 px-4 py-2 text-sm text-navy-800/40" aria-disabled="true">Next &raquo;</span>
        @endif
    </nav>
@endif
