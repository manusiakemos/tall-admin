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
    @include("includes._meta")

    @if(isset($Htmltitle))
        <title>{{$Htmltitle}}</title>
    @else
        <title>{{config('setting.app_name.value') ?? config('app.name')}}</title>
    @endif

    @stack("stylesBefore")
    @include("includes._styles")

    @livewireStyles

    @stack("styles")
    @stack("scriptsBefore")

    <script data-turbolinks-eval="false" data-turbo-eval="false" defer
            src="{{ asset('vendor/alpine/alpine.js') }}"></script>

    <script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/app.js') }}"></script>

    {{--    <script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/turbolinks.js') }}"></script>--}}


</head>
<body class="bg-gray-200 dark:bg-gray-900 dark:text-gray-300 text-gray-700 relative"
      x-data="{showSidebar : true}">

<main>
    {{ $slot }}
</main>

@livewireScripts


@stack("scripts")
@stack("stylesAfter")


</body>
</html>
