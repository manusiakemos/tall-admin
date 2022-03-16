<div wire:ignore.self x-transition.duration.500ms>
    <ul id="{{$selector}}" class="font-body text-sm capitalize">
        <x-ui.navigation-item session-active="home" link="{{route('home')}}">
            <div class="flex">
                <i class="text-xl flex items-center fi-rr-chart-histogram mr-3"></i>
                Dashboard
            </div>
        </x-ui.navigation-item>

        <x-ui.navigation-item session-active="slider" link="{{route('slider')}}">
            <div class="flex">
                <i class="text-xl flex items-center fi-rr-picture mr-3"></i>
                Sliders
            </div>
        </x-ui.navigation-item>

        @role('super-admin')

        <x-ui.navigation-item session-active="user" link="{{route('user')}}">
            <div class="flex">
                <i class="text-xl flex items-center fi-rr-user mr-3"></i>
                User Management
            </div>
        </x-ui.navigation-item>

        <x-ui.navigation-item session-active="setting" link="{{route('setting')}}">
            <div class="flex">
                <i class="text-xl flex items-center fi-rr-settings mr-3"></i>
                Setting
            </div>
        </x-ui.navigation-item>

        <x-ui.navigation-dropdown session-expanded="utilities">
            <x-slot name="drop">
                <i class="text-xl flex items-center fi-rr-box"></i>
                <span class="ml-3"> Utilites </span>
            </x-slot>
            <x-ui.navigation-item session-active="tinker" link="{{url('tinker')}}">
                Web Tinker
            </x-ui.navigation-item>
            @if(config('crud.enabled'))
                <x-ui.navigation-item session-active="crud" link="{{url('crud')}}">
                    Crud Generator
                </x-ui.navigation-item>
            @endif
            <x-ui.navigation-item session-active="schematics" link="{{url('schematics')}}">
                Schematics
            </x-ui.navigation-item>
            <x-ui.navigation-item session-active="routes" link="{{url('routes')}}">
                Pretty Routes
            </x-ui.navigation-item>
            <x-ui.navigation-item session-active="laravel-filemanager"
                                  link="{{url('laravel-filemanager')}}">
                File Manager
            </x-ui.navigation-item>
        </x-ui.navigation-dropdown>
        @endrole
    </ul>
</div>

