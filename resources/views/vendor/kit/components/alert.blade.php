<div x-cloak
    x-on:click.self="show=false"
    x-transition.duration.500ms
    x-show="show"
    x-data="{
     show:@entangle($attributes->wire('model')),
     duration:{{ $attributes->get('duration') }}
    }"
    x-init="$watch('show', (value) => {
        let t = setTimeout(()=>{
            show = false;
        }, duration)
    });"
    {{ $attributes->merge([
        'class' => 'text-sm text-left h-12 mb-4 p-4 w-full flex items-center justify-between rounded-md',
    ]) }}>
    <div class="flex gap-4">
        <div>
            {{ $slot }}
        </div>
    </div>

    <div>
        <span class="flex items-center text-lg fi-rr-cross-circle cursor-pointer" x-on:click="show = false"></span>
    </div>
</div>

