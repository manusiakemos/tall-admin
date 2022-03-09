<header x-data="{ isOpen: false }"
        x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
        x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
        x-transition:enter="transition ease-in duration-100"
        x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
        x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2"
        class="bg-gray-900 py-5 px-6 block md:hidden relative">
    <div class="flex items-center justify-between">
        <a href="#" class="text-white dark:text-warning-400 text-2xl font-semibold font-display uppercase text-center">
            {{config('setting.app_name.value')?? config('app.name')}}
        </a>

        <button @click="isOpen = !isOpen"
                class="text-white text-3xl focus:outline-none relative">
            <i x-show.transition="!isOpen" x.transition.duration.500ms class="fi-rr-menu-burger text-white dark:text-warning-400"></i>
            <i x-show.transition="isOpen" x.transition.duration.500ms class="fi-rr-cross text-white dark:text-warning-400"></i>
        </button>
    </div>

    <!-- Dropdown Nav Mobile -->
    <nav x-show="isOpen" class="pt-4 w-full h-full min-h-screen backdrop-filter backdrop-blur-xl backdrop-sepia-0 bg-black/70 fixed left-0 top-0 z-50" x-transition.duration.500ms>
        <div class="px-6 py-3 flex justify-between">
            <h4 class="heading text-white">{{config('setting.app_name.value') ?? config('app.name')}}</h4>
            <button @click="isOpen = !isOpen"
                    class="text-white text-3xl focus:outline-none relative">
                <i x-show.transition="isOpen" x.transition.duration.500ms class="fi-rr-cross text-white dark:text-warning-400"></i>
            </button>
        </div>
        <x-ui.navigation selector="mobileNavId"></x-ui.navigation>
    </nav>
</header>
