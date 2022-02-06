<div>
    <div
        x-cloak
        x-on:click.self="show=false"
        x-transition.duration.500ms
        x-show="show"
        x-data="{
            show:true
        }"
        @if($autoClose)
        x-init="setTimeout(function () {
                    show = false
                }, 2500)"
        @endif
        {{$attributes->merge(
                [
                    'class'=>'text-sm text-left text-white bg-primary-500 h-12 mb-4 p-4 w-full flex items-center justify-between rounded-md'
                ]
               )}}
    >
        <div class="flex gap-4">
            @if(isset($icon))
                {{$icon}}
            @else
                <span class="flex items-center fi-rr-bell"></span>
            @endif
            <div>
                {{$slot}}
            </div>
        </div>

        <div>
            <span class="flex items-center text-lg fi-rr-cross-circle cursor-pointer" x-on:click="show = false"></span>
        </div>
    </div>
</div>
