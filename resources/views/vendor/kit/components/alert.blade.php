<div x-cloak
     style="display: none"
     x-on:click.self="show=false"
     x-transition.duration.500ms
     x-show="show"
     x-data="
     {
        show:@entangle($attributes->wire('model')),
        duration:{{ $attributes->get('duration') }}
     }"
     x-init="$watch('show', (value) => {
        if (value){
            let t = setTimeout(()=>{
                show = false;
            }, duration);
        }
    });"
    {{ $attributes->merge([
        'class' => 'text-sm text-left h-12 mb-4 p-4 w-full flex items-center justify-between rounded-md font-semibold',
    ]) }}>
    <div class="flex gap-4">
        <div>
            {{ $slot }}
        </div>
    </div>

    <div>
        <span class="flex items-center text-lg cursor-pointer" x-on:click="show = false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></svg>
        </span>
    </div>
</div>
