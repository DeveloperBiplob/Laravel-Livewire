<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-between align-items-center">
            <!-- Previous Page Link -->
            <span>
                @if ($paginator->onFirstPage())
                    <button class="btn btn-secondary" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <button class="btn btn-secondary" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @endif
            </span>

            <!-- Pagination Elements -->
            <ul class="pagination mb-0">
                @foreach ($elements as $element)
                    <!-- "Three Dots" Separator -->
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    <!-- Array Of Links -->
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><button class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>

            <!-- Next Page Link -->
            <span>
                @if ($paginator->onLastPage())
                    <button class="btn btn-secondary" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @else
                    <button class="btn btn-secondary" wire:click="nextPage" wire:loading.attr="disabled" rel="next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </span>
        </nav>
    @endif
</div>
