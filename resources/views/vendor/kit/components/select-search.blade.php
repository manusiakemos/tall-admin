@props(['options','optionValue','optionText'])
<!-- custom-select2 -->
<div class="relative w-full"
    wire:ignore.self wire:key="{!! $attributes->get('id') !!}" x-on:click.outside="show = false"
    x-on:click.away="show = false" x-init="

        $nextTick(() => {
            let x = options.filter((item)=>{
                return item.{!! $optionValue !!} == selected;
            });
            selectedText = x[0].{!! $optionText !!};
        })
        {{-- selectedText = x[0].{!! $optionText !!}; --}}
        $watch('show', (value)=>{
            if (value == false && !selected){
                search = '';
            }
        });
        $watch('selected', (value)=>{
           let x = options.filter(item=>{
                 return item.{!! $optionValue !!} == value;
           });

           if (x.length){
               search = x[0].{!! $optionText !!};
               selectedText = x[0].{!! $optionText !!};
           }else{
               search = '';
           }
        });
        if (options.length > 0){
            let x = options.filter((item)=>{
                 return item.{!! $optionValue !!} == selected;
             });
             if (x.length){
                 search = x[0].{!! $optionText !!};
             }else{
                 search = '';
             }
        }" x-data="{
        options: @js($options),
        show:false,
        search:'',
        selected: @entangle($attributes->wire('model')),
        selectedText:'',
        disabled:false,
        get filteredOptions() {
            if(this.search == '' || this.search == null){
                return this.options;
            }
            if (this.options.length > 0){
               return this.options.filter((item) => {
                  if (this.search === '') {
                    return this.options;
                  }else{
                    return item.{{ $optionText }}.toString().toLowerCase().includes(this.search.toString().toLowerCase());
                  }
               });
            }
        }
     }">
    <div class="relative flex items-center">
        <div x-text="selectedText" placeholder="{{ $placeholder ?? '' }}" autocomplete="off"
            x-on:click="show = true; search = '';" id="selected-{!! $attributes->get('id') !!}"
            class="mt-1 flex items-center w-full rounded-md dark:bg-gray-600
               bg-gray-200 border-transparent h-10
               focus:border-secondary-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0
               text-sm text-gray-700 dark:text-gray-200 px-3">
        </div>

        <!-- Outline Button -->

        <div class="absolute right-0 top-0">
            <x-kit.button variant="rounded" x-show="!show" x-on:click="selectedText = ''; selected = '';"
                class="text-primary-500 dark:text-primary-300 font-sans text-sm">
                clear
            </x-kit.button>
        </div>

    </div>


    <input type="text" x-show="show" x-model="search" placeholder="{{ $placeholder ?? '' }}" autocomplete="off"
        x-on:click="show = true; search = '';" id="search-{!! $attributes->get('id') !!}"
        class="mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent
                      focus:border-secondary-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0
                      text-sm text-gray-700 dark:text-gray-200">

    <input type="hidden" x-model="selected" x-on:click="show = true; search = '';">

    <ul x-show="show" x-transition
        class="relative inset-x-0 top-0 bg-white shadow dark:bg-gray-900 z-50
                cursor-pointer rounded-md min-h-[80px] max-h-[160px]
                overflow-y-scroll overflow-x-hidden">
        <template x-for="item in filteredOptions">
            <li class="text-xs text-gray-700 dark:text-gray-300 border-b border-gray-300 dark:border-gray-800
                       hover:bg-gray-100 dark:hover:bg-gray-700 shadow-sm z-20 p-3"
                x-on:click="search = item.{!! $optionText !!};selected = item.{!! $optionValue !!};show = false;"
                x-text="item.{{ $optionText }}">
            </li>
        </template>
    </ul>
</div>
