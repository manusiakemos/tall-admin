@props(['variant'])
@if ($variant == 'rounded')
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'm-1 py-2 px-4 rounded hover:shadow rounded transform hover:scale-105 transition-all',
        ]) }}>
        {{ $slot }}
    </button>
@elseif($variant == 'dropdown')
    <div x-data="{show:false}" x-on:click.outside="show = false" class="relative">
        <button x-on:click="show = !show"
            {{ $attributes->merge([
                'type' => 'button',
                'class' => 'm-1 py-2 px-4 rounded hover:shadow rounded transform hover:scale-105 transition-all',
            ]) }}>
            {{ $slot }}

        </button>
        <div
            class="left-0 mt-1 px-6 py-3 bg-white dark:bg-gray-900 rounded-xl w-64"
            x-transition
            x-show="show">
            {{ $dropdown }}
        </div>
    </div>


@elseif($variant == 'circle')
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'm-1 p-2 rounded-full flex items-center justify-center transform hover:scale-105 transition-all',
        ]) }}>
        {{ $slot }}
    </button>

@elseif($variant == 'outline')
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'border-2 m-1 p-2 flex items-center justify-center transform hover:scale-105 transition-all',
        ]) }}>
        {{ $slot }}
    </button>

@elseif($variant == 'link')
    <a {{ $attributes->merge(['class' => 'py-2']) }}>
        {{ $slot }}
    </a>
@endif
