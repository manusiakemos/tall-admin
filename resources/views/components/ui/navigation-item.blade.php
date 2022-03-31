@props(['sessionActive', 'link'])
@php
    if( session('active') == $sessionActive){
        $classActive = 'shadow-xl backdrop-filter bg-white dark:bg-gray-900 rounded-xl px-4 py-4';
    }else{
        $classActive='px-1 py-2';
    }
@endphp
<li {!! $attributes->merge(['class' => 'mx-6 my-3 nav-item ' .$classActive]) !!}>
    <a href="{{$link}}" target="{{$attributes->get('target') ?? '_self'}}" aria-expanded="false" class="text-sm">
        {{$slot}}
    </a>
</li>
