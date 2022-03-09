<div
    x-data="{
               search:'',
               items: @entangle($attributes->wire('model'))
            }
    "
>
    <x-input.text class="rounded bg-gray-300 w-full h-full p-3 flex" x-model="search"></x-input.text>

    <button type="button" x-on:click="items.push(search); search = '';"
            class="rounded px-3 py-1 bg-primary-500 text-white mt-3" x-show="search.length > 0"
            x-text="`add ''${search}''`"></button>

    <div class="flex mt-3">
        <template x-for="(item,index) in items" :key="index">
            <div class="text-gray-100 rounded-lg px-3 py-1 mr-3 bg-primary-500 w-auto relative flex">
                <span x-text="item"></span>
                <button type="button"
                        x-on:click="items = arrayRemove(items, item)"
                        class="rounded-full h-4 w-4 ml-3 bg-primary-300 text-gray-500 flex items-center justify-center">
                    x
                </button>
            </div>
        </template>
    </div>

    <script>
        function arrayRemove(arr, value) {
            let d =  arr.filter(function(ele){
                return ele != value;
            });
            console.log(d);
            return d;
        }
    </script>
</div>
