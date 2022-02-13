@if ($errors->any())
    <div class="fixed top-5 right-5 w-full p-6 z-50">
        <div
            x-cloak
            x-on:click.self="show=false"
            x-transition.duration.500ms
            x-show="show"
            x-data="{
            show:true
        }"
            x-init="setTimeout(function () {
                    show = false
                }, 2500)"
            {{$attributes->merge(
                    [
                        'class'=>'text-sm text-left text-white bg-danger-500 h-12 mb-4 p-4 w-full flex items-center justify-between rounded-md'
                    ]
                   )}}
        >
            <div class="flex gap-4">
               Mohon lengkapi form
            </div>

            <div>
                <span class="flex items-center text-lg fi-rr-cross-circle cursor-pointer" x-on:click="show = false"></span>
            </div>
        </div>
    </div>
@endif
