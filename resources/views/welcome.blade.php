<x-guest-layout>
    <div style="background: url('{{ asset('images/bg-glass.png') }}') no-repeat; background-size: cover"
        class="w-full min-h-screen relative bg-center bg-fixed">
        <div
            class="flex justify-center items-center relative backdrop-filter backdrop-blur-3xl backdrop-sepia-0  dark:bg-black/50 min-h-screen h-full w-full ">
            <nav class="fixed top-0 right-0 w-full flex justify-end items-center">
                <div class="py-6 px-12">
                    @if(!auth()->check())
                        @if(\Illuminate\Support\Facades\Route::has('register'))
                            <a href="{{url('/register')}}"
                               class="text-lg text-gray-700 hover:text-primary-500 font-semibold uppercase">register</a>
                        @endif
                        @if(\Illuminate\Support\Facades\Route::has('login'))
                            <x-kit::nav-link href="{{route('login')}}">login</x-kit::nav-link>
                        @endif
                    @else
                        <x-kit::nav-link href="{{route('home')}}">home</x-kit::nav-link>
                    @endif

                    <x-kit::nav-link target="_blank" rel="noreferrer" href="{{route('privacy')}}">privacy & policy</x-kit::nav-link>
                </div>
            </nav>
            <section>
                <div class="container mx-auto py-6">
                    <h1 class="font-bold text-2xl md:text-4xl tracking-wider uppercase text-center">
                        {{__('messages.welcome')}} {{config('setting.app_name.value') ?? config('app.name')}}
                    </h1>
                </div>
            </section>
        </div>
    </div>

</x-guest-layout>
