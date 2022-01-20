<div class="grid md:grid-cols-2">
    <div class="min-h-screen w-full bg-gradient-to-br from-indigo-600 to-blue-500
                flex flex-col items-center justify-center px-12">
        <h1 class="text-4xl mb-12 font-serif uppercase tracking-wide">Welcome to {!! config('setting.app_name.value') ?? config('app.name') !!}</h1>
        <img class="max-h-[400px]" src="{{ asset('images/login.svg') }}" alt="">
    </div>
    <div
        style="background: url('{!! asset('images/bg.jpg') !!}'); background-position: center center; background-size: cover"
        class="flex justify-center items-center min-h-screen w-full
                    backdrop-filter backdrop-sepia-0 bg-black/30 relative">
        <div
            class="absolute inset-0 min-h-screen w-full backdrop-filter backdrop-blur-sm backdrop-sepia-0 bg-black/30"></div>
        <div class="backdrop-filter backdrop-blur-xl backdrop-sepia-0 bg-white/70
                        flex flex-col w-full mx-12 px-12 py-6 rounded-tl-3xl rounded-br-3xl">
            <h5 class="text-center font-display font-bold text-xl tracking-wider mb-12 uppercase tracking-wider text-gray-700 dark:text-gray-300">
                {{$logo}}
            </h5>

            {{$slot}}
        </div>
    </div>
</div>
