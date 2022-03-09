<div class="z-0 text-gray-700 dark:text-gray-300">
    <div x-data="{
            tabHeaders: @js($attributes->get('tab-headers')),
            tabActive: @entangle($attributes->wire('model')),
        }">
        <!-- The tabs navigation -->
        <div
            class="flex justify-center items-center overflow-auto whitespace-nowrap border-2 border-gray-700 dark:border-gray-300 rounded-t-xl">
            {{-- head --}}
            <template x-for="(header,index) in tabHeaders" :key="`tab-${index}`">
                <button :id="`tabBtn-${index}`" :disabled="header.disabled" ,
                    class="uppercase font-semibold flex flex-1 justify-center items-center p-3 border-gray-700 dark:border-gray-300"
                    :class="
                    {
                        'border-r-2': index < tabHeaders.length - 1,
                        'cursor-not-allowed': header.disabled,
                        'bg-primary-500 text-white': header.key == tabActive,
                        'bg-white dark:bg-gray-700 text-gray-700 dark:text-white hover:text-primary-500 dark:hover:text-primary-300': header.key != tabActive,
                    }"
                    x-on:click.prevent="tabActive = header.key">
                    <span class="hidden md:block" x-text="header.title"></span>
                    <span class="block md:hidden" x-html="header.icon"></span>
                </button>
            </template>
        </div>

        <!-- The tabs content -->
        <div
            class="p-3 bg-white dark:bg-gray-700 rounded-b-xl border-l-2 border-r-2 border-b-2 border-gray-700 dark:border-gray-300 relative">
            @foreach ($tabHeaders as $tab)
                <div x-transition x-show="tabActive === '{{ $tab['key'] }}'">
                    <div>
                        {{ ${$tab['key']} }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
