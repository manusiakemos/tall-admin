<header
    class="w-full
        bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300
        flex justify-between items-center
        py-2 px-5">

    <div id="header-left-part" class="w-full">
        <div class="block md:hidden">
            <x-ui.darkmode></x-ui.darkmode>
        </div>
        <button @click="showSidebar = !showSidebar"
                class="hidden md:block
                text-white text-2xl focus:outline-none relative">
            <i x-show.transition="!showSidebar" x.transition.duration.500ms
               class="fi-rr-menu-burger text-gray-700 hover:text-gray-500 dark:hover:text-gray-400 dark:text-gray-300"></i>
            <i x-show.transition="showSidebar" x.transition.duration.500ms
               class="fi-rr-cross text-gray-700 hover:text-gray-500 dark:hover:text-gray-400 dark:text-gray-300"></i>
        </button>
    </div>

    <div id="header-right-part" x-data="{ isOpen: false }" x-cloak
         class="relative flex justify-end items-center w-full">

        <div class="hidden md:block">
            <x-ui.darkmode/>
        </div>

        <x-ui.avatar/>
    </div>

</header>

@push("scripts")
    <form action="{{ url('/logout') }}" method="post" id="formlogout">
        @csrf
    </form>
    <script data-turbolinks-eval="false" data-turbo-eval="false">
        document.querySelector(".btn-logout").addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector("#formlogout").submit();
        });
    </script>
@endpush
