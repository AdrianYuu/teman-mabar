@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="mt-4 inline-flex -space-x-px text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span
                        class="flex h-8 cursor-default items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500">
                        {!! __('pagination.previous') !!}
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span
                            class="flex h-8 cursor-default items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-blue-50 px-3 text-blue-600">
                                    {{ $page }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                        {!! __('pagination.next') !!}
                    </a>
                </li>
            @else
                <li>
                    <span
                        class="flex h-8 cursor-default items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500">
                        {!! __('pagination.next') !!}
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
