@if($variant == "normal")
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'm-1 text-white font-bold py-2 px-4 rounded hover:shadow rounded-3xl transform hover:scale-105 transition-all uppercase tracking-wider font-sans']) }}>
        {{ $slot }}
    </button>

@elseif($variant == "circle")
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'm-1 text-white font-bold py-2 px-4 rounded-full h-10 w-10 flex items-center justify-center transform hover:scale-105 transition-all uppercase tracking-wider font-sans']) }}>
        {{ $slot }}
    </button>

@elseif($variant == "text")
    <button
        {{ $attributes->merge(['type' => 'button', 'class' => 'block px-4 py-2 dark:text-white w-full flex justify-start uppercase tracking-wider font-sans']) }}>
        {{ $slot }}
    </button>

@elseif($variant == "link")
    <a{{ $attributes->merge(['class' => 'py-2 hover:text-red-500 text-red-400 flex justify-start uppercase tracking-wider font-sans']) }}>
        {{ $slot }}
    </a>
@endif
