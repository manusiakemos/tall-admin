<div class="flex cursor-pointer"
     @click="toggle = !toggle"
     x-data="{ toggle: @entangle($attributes->wire('model')) }"
     x-init="toggle == '0' ? toggle = false : toggle = true">
    <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
         :class="toggle ? 'dark:bg-yellow-400 bg-blue-400' : 'bg-gray-400'">
        <label for="toggle"
               class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full
                      transition transform duration-100 ease-linear cursor-pointer"
               :class="toggle ? 'translate-x-full dark:border-yellow-400 border-blue-400' : 'translate-x-0 border-gray-400'"></label>
        <input type="checkbox" {!! $attributes->merge(['class' => 'hidden w-full h-full active:outline-none focus:outline-none']) !!}>
    </div>
</div>
