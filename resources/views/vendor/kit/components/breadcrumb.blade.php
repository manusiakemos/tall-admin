@props(['items'])
<nav class="p-3 mb-3 rounded-xl shadow bg-white dark:bg-gray-700">
    <ul class="flex flex-wrap items-center py-1 text-gray-700 dark:text-white text-sm lg:text-base">
        @foreach ($items as $item)
            @if (!$item['active'])
                <li class="flex items-center">
                    <a href="{{ $item['link'] }}" class="hover:text-primary-500 rounded-xl p-1 px-2 text-sm mr-2">
                        {{ $item['title'] }}
                    </a>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $item['link'] }}"
                        class="hover:text-primary-300 text-gray-400 rounded-xl p-1 px-2 text-sm mr-2">
                        {{ $item['title'] }}
                    </a>
                </li>
            @endif
            @if (!$loop->last)
                <span class="fi-rr-angle-right text-gray-400"></span>
            @endif
        @endforeach
    </ul>
</nav>
