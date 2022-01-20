<header x-data="{ isOpen: false }" x-transition.duration.500ms class="w-full bg-gray-900 py-5 px-6 block md:hidden">
    <div class="flex items-center justify-between relative">
        <a href="#" class="text-white dark:text-yellow-400 text-2xl font-semibold font-display uppercase text-center">
            {{config('setting.app_name.value')?? config('app.name')}}
        </a>

        <button @click="isOpen = !isOpen"
                class="text-white text-3xl focus:outline-none relative">
            <i x-show.transition="!isOpen" x.transition.duration.500ms class="fi-rr-menu-burger text-white dark:text-yellow-400"></i>
            <i x-show.transition="isOpen" x.transition.duration.500ms class="fi-rr-cross text-white dark:text-yellow-400"></i>
        </button>
    </div>

    <!-- Dropdown Nav Mobile -->
    <nav x-show="isOpen" class="flex flex-col pt-4" x-transition.duration.500ms>
        <x-ui.navigation selector="mobileNavId"></x-ui.navigation>
    </nav>
</header>
