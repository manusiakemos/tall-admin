<!doctype html>
<html
    x-data="{
                theme: localStorage.getItem('theme') ?? 'dark',
                theme_icon : localStorage.getItem('theme-icon'),
                setTheme(val){
                    console.log('theme-icon : ' + val)
                    localStorage.setItem('theme-icon', val);
                    if (val != 'system'){
                        localStorage.setItem('theme', val)
                    }else{
                        this.theme = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
                        console.log('theme : ' + this.theme)
                        localStorage.setItem('theme', this.theme);
                    }
                }
              }"
    x-init="
            $watch('theme_icon', (value) => {
                localStorage.setItem('theme-icon', value);
                setTheme(value);
            })
            setTheme(theme_icon);
        "
    :class="theme"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

{{ $slot }}

@livewireScripts


@stack("scripts")
@stack("stylesAfter")


</body>
</html>
