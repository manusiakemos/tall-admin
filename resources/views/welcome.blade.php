<x-guest-layout>
    <x-ui.radial class="absolute left-10 top-10 w-32 h-32"></x-ui.radial>
    <x-ui.radial class="absolute right-10 bottom-10 w-32 h-32"></x-ui.radial>
    <div
        class="min-h-screen min-w-screen flex justify-center items-center relative backdrop-filter backdrop-blur-3xl backdrop-sepia-0 bg-white/30 min-h-screen h-full w-full ">
        <nav class="absolute top-0 right-0 w-full flex justify-end items-center">
            <div class="p-3 px-12">
                @if(!auth()->check())
                    @if(\Illuminate\Support\Facades\Route::has('register'))
                        <a href="{{url('/register')}}"
                           class="text-lg text-gray-700 hover:text-primary-500 font-semibold uppercase">register</a>
                    @endif
                    @if(\Illuminate\Support\Facades\Route::has('login'))
                        <a href="{{url('/login')}}"
                           class="text-lg tracking-wider ml-3 text-gray-700 hover:text-primary-500 font-semibold uppercase">login</a>
                    @endif
                @else
                    <a href="{{url('/home')}}"
                       class="text-gray-700 text-lg hover:text-primary-500 font-semibold uppercase">home</a>
                @endif

                    <a href="{{route('privacy')}}" target="_blank"
                       class="text-gray-700 text-lg hover:text-primary-500 font-semibold uppercase ml-3">privacy & policy</a>
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

</x-guest-layout>
