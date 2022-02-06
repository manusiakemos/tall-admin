@props(['sessionExpanded'])
<li class="nav-item ml-3"
    x-data="{show:{{ session('expanded') == $sessionExpanded ? 'true' : 'false'}} }">
    <a href="javascript:void(0)" x-on:click="show = !show"
       class="text-sm flex justify-between items-center">
        <div class="flex items-center">
            {{ $drop }}
        </div>
        <span :class="{'transform rotate-90 duration-150' : show}"
              class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
    </a>

    <ul x-show="show"
        x-on:click.away="show = false"
        x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2"
        x-transition:enter-end="opacity-100 transform scale-y-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
        x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2"
        {!! $attributes->merge(['class'=>'pt-2 pl-2']) !!}>
        {{$slot}}
    </ul>


</li>
