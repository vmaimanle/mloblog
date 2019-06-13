@if ($paginator->hasPages())
    <ul class="am-pagination tpl-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="am-pagination-prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&laquo; Prev</span>
            </li>
        @else
            <li class="am-pagination-prev">
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo; Prev</a>
            </li>
        @endif


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="am-pagination-next">
                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next &raquo;</a>
            </li>
        @else
            <li class="am-pagination-next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="" aria-hidden="true">Next &raquo;</a>
            </li>
        @endif
    </ul>
@endif
