<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("includes._meta")

    <title>{{$title}}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-gray-200 dark:bg-gray-900 dark:text-gray-300 text-gray-700 relative">

{{ $slot }}

@stack("scripts")


</body>
</html>
