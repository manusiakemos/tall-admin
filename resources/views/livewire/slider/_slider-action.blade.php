<div class="flex justify-center items-center">
    <x-ui.button class="bg-primary-500 text-white hover:bg-primary-400"
                 variant="circle"
                 data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                 wire:click="$emitTo('slider.slider-page', 'edit',[{{$row->slider_id}}])">
        <span class="flex items-center fi-rr-pencil"></span>
    </x-ui.button>
    <x-ui.button variant="circle" class="bg-danger-500 text-white hover:bg-danger-400"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                    wire:click="$emit('confirmDestroy', {{$row->slider_id}})">
        <span class="flex items-center fi-rr-trash"></span>
    </x-ui.button>
</div>
