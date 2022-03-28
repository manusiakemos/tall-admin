<div class="flex items-center">
    <div class="items-center relative">
        <button @click="isOpen = !isOpen"
                class="rounded-full overflow-hidden
                       border-4 border-gray-5O0">
            <img class="w-10"
                 src="{{ auth()->user()->getMedia("avatar")->first()
                                ? asset(auth()->user()->getMedia("avatar")->first()->getUrl())
                                : asset('images/avatar.png')}}"
                 alt="avatar">
        </button>
        {{-- dropddown box --}}
        <div x-show="isOpen"
             x-on:click.outside="isOpen = !isOpen"
             style="display: none"
             x-transition.duration.500ms
             class="absolute top-0 left-0 md:-left-12
            w-40 bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-100 rounded-lg
            shadow-lg border py-4 mt-16 z-50">
            <a href="{{route('profile')}}"
               class="rounded-tl-lg rounded-br-lg block px-4 py-2 account-link hover:text-primary-500">
                {{__('messages.account')}}
            </a>
            <a href="{{url('/logout')}}"
               class="rounded-tl-lg rounded-br-lg block px-4 py-2 account-link hover:text-primary-500 btn-logout">
                {{__('messages.logout')}}
            </a>
        </div>
    </div>
    <div class="md:mx-3 items-center hidden md:block">
        <span class="text-sm font-semibold">
            {{ \Illuminate\Support\Str::limit(auth()->user()->name,16,'...') }}
        </span>
    </div>
</div>
