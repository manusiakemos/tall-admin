<div class="flex items-center">
    <div class="items-center">
        <button @click="isOpen = !isOpen"
                class="rounded-full overflow-hidden
                       border-4 border-gray-5O0">
            <img class="w-10"
                 src="{{ auth()->user()->getMedia("avatar")->first()
                                ? asset(auth()->user()->getMedia("avatar")->first()->getUrl())
                                : asset('images/avatar.png')}}"
                 alt="avatar">
        </button>
    </div>
    <div class="md:mx-3 items-center hidden md:block">
        <span class="text-sm font-semibold">
            {{ \Illuminate\Support\Str::limit(auth()->user()->name,16,'...') }}
        </span>
    </div>
</div>

{{-- dropddown box --}}
<button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
<div x-show="isOpen"
     style="display: none"
     x-transition.duration.500ms
     class="absolute w-40 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100 rounded-lg
            border-2 shadow-lg py-4 mt-16 z-50">
    <a href="{{route('profile')}}"
       class="rounded-tl-lg rounded-br-lg block px-4 py-2 account-link hover:text-primary-500">
        {{__('messages.account')}}
    </a>
    <a href="{{url('/logout')}}"
       class="rounded-tl-lg rounded-br-lg block px-4 py-2 account-link hover:text-primary-500 btn-logout">
        {{__('messages.logout')}}
    </a>
</div>
