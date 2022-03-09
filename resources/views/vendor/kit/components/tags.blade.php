<div
    x-data="{
               search:'',
               items: @entangle($attributes->wire('model')),
               arrayRemove(arr, value) {
                    let d =  arr.filter(function(ele){
                        return ele != value;
                    });
                    return d;
                }
            }
    "
>
    <x-kit.input placeholder="{{ $attributes->get('placeholder') ?? '' }}" x-model="search"/>

    <button type="button" x-on:click="items.push(search); search = '';"
            class="rounded px-3 py-1 bg-primary-500 text-white mt-3" x-show="search.length > 0">
        Add "<span x-text="search"></span>"
    </button>

    <div class="flex flex-wrap mt-1">
        <template x-for="(item,index) in items" :key="index">
            <div class="px-2 py-1 mr-1 relative">
                <div class="w-11/12 left-0 mr-3 bg-primary-500 text-gray-100 rounded-lg px-3 py-1" x-text="item"></div>
                <button type="button"
                        x-on:click="items = arrayRemove(items, item)"
                        class="rounded-full h-6 w-6 ml-1 bg-primary-600 hover:bg-primary-700 text-gray-100 flex items-center justify-center absolute right-0 top-0 shadow-xl">
                    <span class="fi-rr-cross text-xs"></span>
                </button>
            </div>
        </template>
    </div>
</div>
