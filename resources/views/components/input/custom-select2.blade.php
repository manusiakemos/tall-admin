@props(['placeholder' => 'Pilih salah satu', 'options', 'value', 'text'])

<!-- custom-select2 -->
<div class="relative w-full"
     wire:ignore.self
     wire:key="{!! $attributes->get('id') !!}"
     x-on:click.outside="show = false"
     x-on:click.away="show = false"
     x-init="console.log('init select2');
        $watch('show', (value)=>{
            if (value == false && !selected){
                search = '';
            }
        });
        $watch('search', (value)=>{
            {{--jika pencarian '' maka wire:model ''--}}
         if (value == ''){
             selected = '';
         }
        });
        $watch('selected', (value)=>{
           let x = options.filter(item=>{
                 return item.{!! $value !!} == value;
           });

           if (x.length){
               search = x[0].{!! $text !!};
           }else{
               search = '';
           }
        });
        if (options.length > 0){
            let x = options.filter((item)=>{
                 return item.{!! $value !!} == selected;
             });
             if (x.length){
                 search = x[0].{!! $text !!};
             }else{
                 search = '';
             }
        }"
     x-data="{
        options: @js($options),
        show:false,
        search:'',
        selected: @entangle($attributes->wire('model')),
        disabled:false,
        get filtedangerOptions() {
            if(this.search == '' || this.search == null){
                return this.options;
            }
            if (this.options.length > 0){
               return this.options.filter((item) => {
                  if (this.search === '') {
                    return this.options;
                  }else{
                    return item.{{$text}}.toString().toLowerCase().includes(this.search.toString().toLowerCase());
                  }
               });
            }
        }
     }">
    <input type="text"
           x-model="search"
           placeholder="{{$placeholder ?? ''}}"
           autocomplete="off"
           x-on:click="show = true; search = '';"
           id="{!! $attributes->get('id') !!}"
           class="mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent
                      focus:border-secondary-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0
                      text-sm text-gray-700 dark:text-gray-200">

    <input type="hidden"
           x-model="selected"
           x-on:click="show = true; search = '';">

    <button x-show="!show"
            x-on:click="show = true"
            x-on:focus="show = true"
            type="button"
            class="absolute right-2 top-2">
        <span class="fi-rr-caret-down text-gray-700 dark:text-gray-300"></span>
    </button>

    <ul x-show="show" x-trap="show"
        x-transition
        class="relative inset-x-0 top-0 bg-gray-100 dark:bg-gray-900 z-50
                cursor-pointer rounded-md min-h-[80px] max-h-[160px]
                overflow-y-scroll overflow-x-hidden">
        <template x-for="item in filtedangerOptions">
            <li class="text-xs text-gray-700 dark:text-gray-300 border-b border-gray-300 dark:border-gray-800
                       hover:bg-gray-100 dark:hover:bg-gray-700 shadow-sm z-20 p-3"
                x-on:click="search = item.{!! $text !!};selected = item.{!! $value !!};show = false;"
                x-text="item.{{$text}}">
            </li>
        </template>
    </ul>
</div>
