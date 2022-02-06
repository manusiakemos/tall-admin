<div>
    <div x-data="{ isOpen: false }" x-on:click.away="isOpen = false" x-cloak class="z-50">
        <div class="flex items-start justify-center items-center">
            <button @click="isOpen = !isOpen"
                    class="rounded-full focus:outline-none">
                <span class="relative inline-block">
                     <span class="flex items-center justify-center">
                         <img src="{{ asset('images/bell.svg') }}" alt="bell" class="h-5">
                     </span>
                      <span class="absolute top-0 right-7
                                    inline-flex items-center justify-center px-2 py-1
                                    text-xs font-bold leading-none text-danger-100
                                    transform translate-x-1/2 -translate-y-1/2 bg-danger-500 rounded-full">46</span>
                </span>
            </button>
        </div>
        <div class="flex justify-center z-50">
            <button x-show.transition="isOpen" @click="isOpen = false"
                    class="fixed inset-0 cursor-default"></button>
            <div x-show.transition="isOpen" x-transition.duration.200ms
                 class="absolute md:left-1/4 z-50
                     bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                     rounded-lg shadow-lg
                     py-2 mx-3 z-10
                     w-72 md:w-2/3 h-72
                     overflow-y-scroll">
                @for($i=0; $i<10; $i++)
                    <div class="p-3 text-gray-700 dark:text-gray-300 hover:text-primary-500">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda cupiditate eaque
                            impedit inventore ipsa, ipsam nulla possimus provident quisquam quod rem saepe sint
                            voluptatum. Cum dolorum itaque libero magni optio.</a>
                    </div>
                    @if ($i < 9)
                    <div class="border-b"></div>
                    @endif
                @endfor
            </div>
        </div>

    </div>
</div>
