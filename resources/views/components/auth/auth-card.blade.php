<div class="md:grid md:grid-cols-2" style="background: url('{{ asset('images/bg-glass.png') }}')">
    <div class="hidden md:flex md:flex-col
                min-h-screen w-full bg-gray-900 dark:bg-gray-800
                text-gray-100 items-center justify-center px-12">
        <h1 class="text-4xl mb-12 font-display uppercase tracking-wide">Welcome
            to {!! config('setting.app_name.value') ?? config('app.name') !!}</h1>
        <img class="max-h-[400px]" src="{{ asset('images/login.png') }}" alt="">
    </div>
    <div
        class="flex justify-center items-center
                min-h-screen w-full backdrop-blur-3xl backdrop-sepia-0 bg-white/30 dark:bg-black/50 relative">

        <div class="bg-white/70 dark:bg-gray-900/30 flex flex-col w-full mx-12 px-12 py-6 rounded-tl-3xl rounded-br-3xl shadow-lg">
            <h5
                class="text-center font-display font-bold text-xl
                        tracking-wider mb-12 uppercase tracking-wider text-gray-700 dark:text-gray-300">
                {{$logo}}
            </h5>

            {{$slot}}
        </div>
    </div>
</div>
