@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="d-block w-100">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- First Page --}}
            @if ($paginator->currentPage() > 3)
                <li><a href="{{ $paginator->url(1) }}">1</a></li>
                @if ($paginator->currentPage() > 4)
                    <li class="disabled d-none d-md-block"><span>...</span></li>
                @endif
            @endif

            {{-- Pages Around Current --}}
            @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- Last Page --}}
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li class="disabled d-none d-md-block"><span>...</span></li>
                @endif
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>

    {{-- Mobile pagination info --}}
    <div class="pagination-info d-block d-md-none">
        <small class="text-muted">
            Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} destinations
        </small>
    </div>
@endif