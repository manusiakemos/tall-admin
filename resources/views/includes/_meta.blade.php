<meta name="theme-color" content="#1d293b">
<meta name="title" content="{{config('setting.app_name.value')?? config('app.name')}}">
<meta name="description" content="{{config('setting.app_name.value')?? config('app.name')}}">

<meta property="og:type" content="website">
<meta property="og:url" content="{{url('/')}}">
<meta property="og:title" content="{{config('setting.app_name.value')?? config('app.name')}}">
<meta property="og:description" content="{{config('setting.app_name.value')?? config('app.name')}}">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url('/')}}">
<meta property="twitter:title" content="{{config('setting.app_name.value')?? config('app.name')}}">
<meta property="twitter:description" content="{{config('setting.app_name.value')?? config('app.name')}}">

<meta charset="UTF-8">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="{{ asset('images/laravel.png') }}">
