<div x-data="{
    search: '',
    items: @entangle($attributes -> wire('model')),
    arrayRemove(arr, value) {
        let d = arr.filter(function(ele) {
            return ele != value;
        });
        return d;
    },
    addData(){
        if(this.search){
            this.items.push(this.search);
            this.search = '';
        }
    }
}">
    <x-kit::input
    x-on:keyup.enter.prevent="addData"
    placeholder="{{ $attributes->get('placeholder') ?? '' }}" x-model="search" />

  <div class="mt-1">
    <div x-show="search.length > 0">
        <small>press enter to add</small>
    </div>
    <button type="button"
        x-on:click="addData"
        class="rounded px-3 py-1 bg-gray-500 text-white text-sm" x-show="search.length > 0">
        Add "<span x-text="search"></span>"
    </button>
  </div>

    <div class="flex flex-wrap mt-1">
        <template x-for="(item,index) in items" :key="index">
            <div class="px-2 py-1 mr-1 relative">
                <div class="w-11/12 left-0 mr-3 bg-gray-300 dark:bg-gray-500 text-gray-700 dark:text-gray-300 rounded-lg px-3 py-1" x-text="item"></div>
                <button type="button" x-on:click="items = arrayRemove(items, item)"
                    class="rounded-full h-6 w-6 ml-1 bg-gray-300 hover:bg-primary-400 text-gray-100 flex items-center justify-center absolute right-0 top-0 shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" class="dark:fill-white"/></svg>
                </button>
            </div>
        </template>
    </div>
</div>
