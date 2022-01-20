<div wire:ignore.self x-transition.duration.500ms>
    <ul id="{{$selector}}" class="font-body text-sm capitalize">
        <li class="nav-item {{session('active') == 'home' ? 'nav-active' : ''}}">
            <a href="{{route('home')}}" aria-expanded="false" class="text-sm">
                <div class="flex items-center">
                    <i class="flex items-center fi-rr-stats text-lg"></i>
                    <span class="ml-3"> Dashboard </span>
                </div>
            </a>
        </li>

        <li class="nav-item"
            x-data="{show:{{ session('expanded') == 'admin' ? 'true' : 'false'}} }">
            <a href="javascript:void(0)" x-on:click="show = !show"
               class="text-sm flex justify-between items-center">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi-rr-settings"></i>
                    <span class="ml-3"> Admin </span>
                </div>
                <span :class="{'transform rotate-90 duration-150' : show}"
                      class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
            </a>
            <ul x-show="show"
                x-on:click.away="show = false"
                x-transition.duration.200ms
                class="pt-2 pl-2 overflow-x-hidden overflow-y-scroll
                       {{session('expanded') == 'admin' ? 'mm-show' : 'mm-collapse'}}">

                @role('super-admin')
                    <li class="nav-item {{ session('active') == 'user' ? 'nav-active' : ''}} ml-5">
                        <a href="{{route('user')}}" aria-expanded="false" class="text-sm">
                            User
                        </a>
                    </li>
                @endrole

                <li class="nav-item {{session('active') == 'profile' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('profile')}}" aria-expanded="false" class="text-sm">
                        Profile
                    </a>
                </li>
                <li class="nav-item {{session('active') == 'setting' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('setting')}}" aria-expanded="false" class="text-sm">
                        Setting
                    </a>
                </li>
                <li class="nav-item {{session('active') == 'slider' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('slider')}}" aria-expanded="false" class="text-sm">
                        Slider
                    </a>
                </li>
            </ul>
        </li>

        @role('super-admin')
            <li class="nav-item"
                x-on:click="show = !show"
                x-data="{show:{{ session('expanded') == 'master' ? 'true' : 'false'}} }">
                <a href="javascript:void(0)" class="text-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="text-xl flex items-center fi-rr-tool-crop"></i>
                        <span class="ml-3"> Utilities </span>
                    </div>
                    <span :class="{'transform rotate-90 duration-150' : show}"
                        class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
                </a>
                <x-ui.navigation-dropdown
                    class="{{session('expanded') == 'utilities' ? 'mm-show' : 'mm-collapse'}}">
                </x-ui.navigation-dropdown>
            </li>
        @endrole
    </ul>
</div>

