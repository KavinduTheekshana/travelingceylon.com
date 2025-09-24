@if ($paginator->hasPages())
    <div class="w-100">
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
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled d-none d-md-block">
                            <span>{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active">
                                    <span>{{ $page }}</span>
                                </li>
                            @else
                                {{-- Show only current page and adjacent pages on mobile --}}
                                @if (
                                    $page == 1 ||
                                    $page == $paginator->lastPage() ||
                                    ($page >= $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1)
                                )
                                    <li>
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @elseif (
                                    $page == $paginator->currentPage() - 2 ||
                                    $page == $paginator->currentPage() + 2
                                )
                                    <li class="disabled d-none d-md-block">
                                        <span>...</span>
                                    </li>
                                @else
                                    {{-- Hide other pages on mobile, show on desktop --}}
                                    <li class="d-none d-lg-block">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
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

        {{-- Mobile pagination info - always show on mobile but underneath pagination --}}
        <div class="pagination-info d-block d-md-none">
            <small class="text-muted">
                Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} {{ $itemType ?? 'items' }}
            </small>
        </div>
    </div>
@endif