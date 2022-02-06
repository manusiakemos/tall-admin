<div class="p-3 mb-3 rounded-xl shadow bg-gray-100 dark:bg-gray-800">
    <ul class="flex items-center py-1 text-gray-700 dark:text-white text-sm lg:text-base">
        @foreach($breadcrumbs as $item)
            <li class="flex items-center">
                <a href="{{$item['link']}}"
                   class="{{!$loop->last
                        ? 'hover:text-white hover:bg-primary-500 dark:hover:bg-warning-500 rounded-xl border-gray-700 dark:border-gray-300 border-2 p-1 px-2 text-sm mr-2'
                        : 'hover:text-white hover:bg-primary-500 dark:hover:bg-warning-500 rounded-xl border-primary-700 dark:border-warning-500 border-2 p-1 px-2 text-sm'
                        }}">
                    {{$item['title']}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
