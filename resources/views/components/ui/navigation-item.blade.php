@props(['sessionActive', 'link'])
@php
    if( session('active') == $sessionActive  ){
        $classActive = 'nav-active';
    }else{
        $classActive = '';
    }
@endphp
<li {!! $attributes->merge(['class' => 'nav-item ' .$classActive]) !!}>
    <a href="{{$link}}" aria-expanded="false" class="text-sm">
        {{$slot}}
    </a>
</li>
