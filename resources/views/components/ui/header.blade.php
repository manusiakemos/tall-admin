<header
    class="w-full
        bg-gradient-to-r from-secondary-600 to-primary-500 dark:from-gray-600 dark:to-gray-800
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
               class="fi-rr-menu-burger text-white dark:text-warning-400"></i>
            <i x-show.transition="showSidebar" x.transition.duration.500ms
               class="fi-rr-cross text-white dark:text-warning-400"></i>
        </button>
    </div>

    <div id="header-right-part" x-data="{ isOpen: false }" x-cloak
         class="relative flex justify-end items-center w-full">

        {{--<x-ui.notifications-bar></x-ui.notifications-bar>--}}

        <div class="hidden md:block">
            <x-ui.darkmode/>
        </div>

        {{--<x-ui.fullscreen-button/>--}}

        <x-ui.avatar/>
    </div>

</header>

@push("scripts")
    <form action="{{ url('/logout') }}" method="post" id="formlogout">
        @csrf
    </form>
    <script data-turbolinks-eval="false" data-turbo-eval="false">
        $(".btn-logout").on("click", function (e) {
            e.preventDefault();
            document.querySelector("#formlogout").submit();
        });
    </script>
@endpush
