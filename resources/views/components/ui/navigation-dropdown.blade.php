<ul x-show="show"
    x-on:click.away="show = false"
    x-transition:enter="transition ease-in-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2"
    x-transition:enter-end="opacity-100 transform scale-y-100 translate-y-0"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
    x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2"
    {!! $attributes->merge(['class'=>'pt-2 pl-2']) !!}>
    <li class="nav-item {{session('active') == 'docs' ? 'nav-active' : ''}} ml-5">
        <a target="_blank" href="https://1drv.ms/b/s!Agl0opIdLuH8mzpNPAUaNIZ1AFhY?e=cXh4M6"
           aria-expanded="false" class="text-sm">
            Docs
        </a>
    </li>
    <li class="nav-item {{session('active') == 'tinker' ? 'nav-active' : ''}} ml-5">
        <a target="_blank" href="{{url('tinker')}}" aria-expanded="false" class="text-sm">
            Tinker
        </a>
    </li>
    <li class="nav-item {{session('active') == 'routes' ? 'nav-active' : ''}} ml-5">
        <a target="_blank" href="{{url('routes')}}" aria-expanded="false" class="text-sm">
            Routes
        </a>
    </li>
    <li class="nav-item {{session('active') == 'schematics' ? 'nav-active' : ''}} ml-5">
        <a target="_blank" href="{{url('schematics')}}" aria-expanded="false" class="text-sm">
            Schematics
        </a>
    </li>
    <li class="nav-item {{session('active') == 'crud' ? 'nav-active' : ''}} ml-5">
        <a target="_blank" href="{{url('crud')}}" aria-expanded="false" class="text-sm">
            CRUD Generator
        </a>
    </li>
</ul>
