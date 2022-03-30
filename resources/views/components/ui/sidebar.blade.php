<aside x-show="showSidebar"
       x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
       x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
       x-transition:enter="transition ease-in duration-100"
       x-transition:leave="transition ease-out duration-100"
       x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
       x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2"
       class="fixed md:w-60 hidden md:block z-10
              inset-0
              dark:bg-gray-800 bg-gray-100"
       id="sidebar">
    <div class="relative w-full h-screen overflow-hidden flex flex-col">
        {{-- top section --}}
        <div id="top" class="flex-none text-white w-full h-16 absolute top-0 bg-gray-100 dark:bg-gray-800">
            <div class="p-6 flex">
                <a href="{{url('/home')}}"
                   class="tracking-wide
                  w-full text-center
                  dark:text-gray-300 text-gray-700 text-xl font-semibold font-display uppercase">
                    {{ config('setting.app_name.value')?? config('app.name') }}</a>
            </div>
            @if(config('setting.app_logo.value'))
                <div class="p-6 flex justify-center">
                    <img src="{{ asset('storage/settings/thumb_'.config('setting.app_logo.value')) }}" alt="app logo">
                </div>
            @endif
        </div>

        {{-- middle section navigation --}}
        <div id="middle" class="text-white w-full grow overflow-scroll py-12">
            <nav class="text-gray-700 dark:text-gray-300 text-base grow overflow-y-scroll">
                <x-ui.navigation selector="sidebarnav"/>
            </nav>
        </div>

        {{-- bottom section --}}
        <div
            id="bottom"
            class="flex-none h-20 text-white w-full absolute left-0 right-0 bottom-0 flex items-center bg-gray-100 dark:bg-gray-800">
            <a href="{{url('logout')}}"
               class="logout-btn w-full md:w-2/3 rounded-md
                  text-white bg-primary-500 dark:bg-primary-800
                  flex items-center justify-center py-4 py-6 mx-auto">
                <i class="flex items-center text-lg fi-rr-sign-out mr-3"></i>
                <span class="text-sm font-bold">Sign Out</span>
            </a>
        </div>
    </div>

</aside>
