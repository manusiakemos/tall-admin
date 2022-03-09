@props(['sessionActive', 'link'])
@php
    if( session('active') == $sessionActive){
        $classActive = 'shadow-xl backdrop-filter backdrop-blur filter-sepia-0 bg-white/30 rounded-xl px-4 py-4';
    }else{
        $classActive='px-1 py-2';
    }
@endphp
<li {!! $attributes->merge(['class' => 'mx-6 my-3 nav-item ' .$classActive]) !!}>
    <a href="{{$link}}" aria-expanded="false" class="text-sm">
        {{$slot}}
    </a>
</li>
