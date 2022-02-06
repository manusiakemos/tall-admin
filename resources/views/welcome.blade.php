<x-guest-layout>
    <div class="min-h-screen min-w-screen flex justify-center items-center relative">
        @if(!auth()->check())
            <nav class="absolute top-0 right-0 w-full flex justify-end items-center">
                <div class="p-3 px-12">
                    @if(\Illuminate\Support\Facades\Route::has('register'))
                        <a href="{{url('/register')}}"
                           class="text-gray-700 text-lg tracking-wider
                          text-primary-100 hover:text-warning-400 font-semibold">REGISTER</a>
                    @endif
                    @if(\Illuminate\Support\Facades\Route::has('login'))
                        @if(!auth()->check())
                            <a href="{{url('/login')}}"
                               class="text-gray-700 text-lg tracking-wider ml-3
                          text-primary-100 hover:text-warning-400 font-semibold">LOGIN</a>
                        @else
                            <a href="{{url('/home')}}"
                               class="text-gray-700 text-lg tracking-wider ml-3
                          text-primary-100 hover:text-warning-400 font-semibold">HOME</a>
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
        <section class="w-full">
            <div class="mx-auto h-full md:grid grid-cols-8 items-center"
                 style="background: url('{{ asset('images/bg.jpg') }}')">
                <div id="section-one-left"
                     class="backdrop-filter backdrop-blur backdrop-sepia-0 bg-gray-800/30
                     col-span-4 min-h-screen flex flex-col items-start justify-center px-12">
                    <h4 class="text-white text-center md:text-left text-2xl md:text-4xl font-extrabold mb-0">
                        Welcome to </h4>
                    <br>
                    <h4 class="text-white text-center md:text-left text-2xl md:text-4xl font-extrabold mb-8 mt-0">
                        {{config('setting.app_name.value') ??  config('app.name') }} </h4>

{{--                    <blockquote class="text-gray-300 font-sans flex">--}}
{{--                        <span class="fi-rr-quote-right"></span>--}}
{{--                        <div class="text-sm text-gray-100 text-center md:text-left mb-3">--}}
{{--                            {!! config('setting.app_about.value') ?? '' !!}--}}
{{--                        </div>--}}
{{--                    </blockquote>--}}
                </div>

                <div id="section-one-right"
                     class="col-span-4 flex justify-center items-center min-h-screen
                            bg-gradient-to-br from-primary-700 to-secondary-700
                            dark:from-gray-800 dark:to-gray-900 px-12">
                    <img class="h-96 mx-12" src="{{ asset('images/welcome.svg') }}" alt="illustration">
                </div>
            </div>
        </section>
    </div>

</x-guest-layout>
