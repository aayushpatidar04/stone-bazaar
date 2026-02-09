@if ($paginator->hasPages())
    <ul class="post-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="icon-arrow-left"></span></li>
        @else
            <li class="active">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="icon-arrow-left"></span></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ sprintf('%02d', $page) }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ sprintf('%02d', $page) }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="active">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="icon-arrow-right"></span></a>
            </li>
        @else
            <li class="disabled"><span class="icon-arrow-right"></span></li>
        @endif
    </ul>
@endif
