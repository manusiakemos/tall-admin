<div x-cloak
    x-on:click.self="show=false"
    x-transition:enter-start="opacity-0 transform scale-x-0 translate-x-1/2"
    x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
    x-transition:enter="transition ease-in duration-200"
    x-transition:leave="transition ease-out duration-200"
    x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
    x-transition:leave-end="opacity-0 transform scale-x-0 translate-x-1/2"
    x-show="show"
    x-data="{
        show:@entangle($attributes->wire('model')),
        duration:{{ $attributes->get('duration') }},
    }"
    x-init="$watch('show', (value) => {
        let t = setTimeout(()=>{
            show = false;
        }, duration)
    });"
    {{ $attributes->merge([
        'class' => 'z-50 h-16 w-64 text-sm text-left h-12 mb-4 p-4 w-full flex items-center justify-between fixed right-10 bottom-0',
    ]) }}>
    <div class="flex gap-4">
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
