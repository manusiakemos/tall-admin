<x-guest-layout>
    <x-ui.radial class="absolute left-10 top-10 w-52 h-52"></x-ui.radial>
    <x-ui.radial class="absolute right-10 bottom-10 w-32 h-32"></x-ui.radial>
    <div
        class="min-h-screen min-w-screen flex justify-center items-center relative backdrop-filter backdrop-blur-3xl backdrop-sepia-0 bg-white/30 min-h-screen h-full w-full ">
        @if(!auth()->check())
            <nav class="absolute top-0 right-0 w-full flex justify-end items-center">
                <div class="p-3 px-12">
                    @if(\Illuminate\Support\Facades\Route::has('register'))
                        <a href="{{url('/register')}}"
                           class="text-primary-500 text-lg tracking-wider
                          text-primary-100 hover:text-warning-400 font-semibold">REGISTER</a>
                    @endif
                    @if(\Illuminate\Support\Facades\Route::has('login'))
                        @if(!auth()->check())
                            <a href="{{url('/login')}}"
                               class="text-lg tracking-wider ml-3 hover:text-primary-400 font-semibold">LOGIN</a>
                        @else
                            <a href="{{url('/home')}}"
                               class="text-lg tracking-wider ml-3 hover:text-primary-400 font-semibold">HOME</a>
                        @endif
                    @endif

                </div>
            </nav>
        @else
            <nav class="absolute top-0 right-0 w-full flex justify-end items-center">
                <div class="p-3 px-12">
                    <a href="{{url('/home')}}"
                       class="text-gray-700 text-lg tracking-wider
                          text-primary-100 hover:text-warning-400 font-semibold">HOME</a>
                </div>
            </nav>
        @endif
        <section>
            <div class="container mx-auto py-6">
                <h1 class="font-bold text-2xl md:text-4xl tracking-wider uppercase text-center">
                    welcome to {{config('setting.app_name.value') ?? config('app.name')}}
                </h1>
            </div>
        </section>
    </div>

</x-guest-layout>
