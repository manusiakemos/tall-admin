<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} Crudgen</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/crudgen/libs/alertifyjs/css/alertify.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/crudgen/libs/alertifyjs/css/themes/default.min.css') }}"/>
    <link href="{{ asset('vendor/crudgen/css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/laravel.png') }}" type="image/png">
    <!-- Scripts -->
    @stack("style")
</head>
<body>

<main>
    @yield('content')
</main>

<script src="{{ asset('vendor/crudgen/libs/alertifyjs/alertify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@stack("script")


</body>
</html>
