{{--
@if ($paginator->hasPages())
--}}

<div class="pagination col-group">
            
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <img src="{{ asset('admin/images/arrow_left_black_24dp.svg') }}" alt="">
        </span>
    @else
        <span>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev" aria-label="@lang('pagination.previous')">
                <img src="{{ asset('admin/images/arrow_left_black_24dp.svg') }}" alt="">
            </a>
        </span>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span num active><a><b>{{ $page }}</b></a></span>
                @else
                    <span num active><a href="{{ $url }}">{{ $page }}</a></span>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <span>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="next" aria-label="@lang('pagination.next')">
                <img src="{{ asset('admin/images/arrow_right_black_24dp.svg') }}" alt="">
            </a>
        </span>
    @else
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <img src="{{ asset('admin/images/arrow_right_black_24dp.svg') }}" alt="">
        </span>
    @endif
    
</div>
{{--
@endif
--}}