<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
