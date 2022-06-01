<!doctype html>
<html
lang="{{ str_replace('_', '-', app()->getLocale()) }}"
x-data="{
            theme: localStorage.getItem('theme') ?? 'dark',
            theme_icon : localStorage.getItem('theme-icon') ?? 'system',
            setTheme(val){
                localStorage.setItem('theme-icon', val)
                if (val == 'light' || val == 'dark'){
                    this.theme = val;
                    localStorage.setItem('theme', val)
                }else{
                    let x = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
                    this.theme = x;
                    localStorage.setItem('theme', x);
                }
            }
          }"
x-init="
        $watch('theme_icon', (value) => {
            setTheme(value);
        })
        setTheme(theme_icon);
    "
:class="theme">
<head>
    @if(isset($htmlTitle))
        {{$htmlTitle}}
    @else
        <title>{{config('setting.app_name.value') ?? config('app.name')}}</title>
    @endif

    @include("includes._meta")

    @stack("stylesBefore")

    @include("includes._styles")

    @livewireStyles

    @stack("styles")

    @stack("scriptsBefore")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/alpine-editor.js') }}"
            defer></script>

</head>
<body
    class="bg-gray-200 dark:bg-gray-900 dark:text-gray-400 text-gray-100 flex text-sm font-body antialiased"
    x-data="{showSidebar : false}"
    x-init="window.screen.width >= 1280 ? showSidebar = true : showSidebar = false">

<x-ui.sidebar/>

{{--main content--}}
<main :class="showSidebar ? 'ml-0 md:ml-60' : ''"
     class="w-full flex flex-col min-h-screen overflow-y-hidden">

    <div class="flex flex-col-reverse lg:flex-col shadow-sm">
        {{-- header for small device--}}
        <x-ui.mobile-header/>
        {{-- header for larger device--}}
        <x-ui.main-header/>
    </div>

    <div class="w-full overflow-x-hidden flex flex-col" id="main-content">
        {{ $slot }}
    </div>
</main>

@livewireScripts
<script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/admin.js') }}"></script>

@stack("scripts")
@stack("stylesAfter")

@auth
    <form action="{{route('logout')}}" method="POST" id="logout-form">
        @csrf
    </form>

    <script>
        $(".logout-btn").on("click", (e) => {
            e.preventDefault();
            $("#logout-form").submit();
        })
    </script>
@endauth
</body>
</html>
