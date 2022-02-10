<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
                theme: localStorage.getItem('theme') ?? 'dark',
                theme_icon : localStorage.getItem('theme-icon')
              } "
      x-init="
        $watch('theme_icon', val => {
           console.log(val);
           localStorage.setItem('theme-icon', val)

           if (val != 'system'){
                localStorage.setItem('theme', val)
           }else{
                let x = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
                theme = x;
                localStorage.setItem('theme', x);
           }
        });

        if (theme_icon == 'system'){
            let x = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
            theme = x;
            localStorage.setItem('theme', x);
        }
      "
      :class="theme ? theme : ''">
<head>
    @include("includes._meta")

    @if(isset($htmlTitle))
        <title>{{$htmlTitle}}</title>
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

    <script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/admin.js') }}"></script>

    {{--    <script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/turbolinks.js') }}"></script>--}}

</head>
<body class="bg-gray-200 dark:bg-gray-900 dark:text-gray-400 text-gray-100 flex text-sm font-body antialiased"
      x-data="{showSidebar : false}"
      x-init="window.screen.width >= 1280 ? showSidebar = true : showSidebar = false">
<x-ui.sidebar></x-ui.sidebar>

<div :class="showSidebar ? 'ml-0 md:ml-60' : ''"
    class="w-full flex flex-col h-screen overflow-y-hidden">

   <div class="flex flex-col-reverse lg:flex-col">
       <x-ui.mobile-header></x-ui.mobile-header>
       <x-ui.header></x-ui.header>
   </div>

    <div class="w-full overflow-x-hidden flex flex-col" id="main-content">
        {{ $slot }}

        <footer class="flex justify-end">
            <small class="text-xs font-bold my-5 mx-5 dark:text-gray-300 text-gray-700">
                <i class="fa fa-copyright"></i> {{date('Y')}} {{ config('setting.app_name.value') }}
            </small>
        </footer>
    </div>
</div>

@auth
    <form action="{{route('logout')}}" method="POST" id="logout-form">
        @csrf
    </form>

    <script>
        $(".logout-btn").on("click", (e)=>{
            e.preventDefault();
            $("#logout-form").submit();
        })
    </script>
@endauth

@livewireScripts
<script data-turbolinks-eval="false" data-turbo-eval="false" src="{{ asset('js/admin_after.js') }}"></script>

@stack("scripts")
@stack("stylesAfter")


</body>
</html>
