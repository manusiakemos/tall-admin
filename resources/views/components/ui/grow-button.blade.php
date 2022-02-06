<div x-data="{ isMenuOpen: false }" class="relative mr-56">
    <div x-show="isMenuOpen"
         x-transition:enter="transition ease-in-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
         x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
         x-transition:leave="transition ease-in-out duration-300"
         x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
         x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2"
         class="absolute inset-y-0 left-1/2 h-20 flex items-center pl-12 pr-3 space-x-2 bg-gray-800 rounded-tr-full rounded-br-full">
       {{$slot}}
    </div>
    <button class="relative h-20 w-20 inline-flex items-center justify-center bg-gray-800 hover:bg-gray-700 rounded-tl-full rounded-bl-full focus:outline-none transition-all duration-300" :class="isMenuOpen ? 'bg-primary-600 hover:bg-primary-600' : 'rounded-tr-full rounded-br-full'" @click="isMenuOpen = !isMenuOpen">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
    </button>
</div>
