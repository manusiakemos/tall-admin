<div class="flex justify-center items-center">
    <x-kit::button class="bg-primary-500 text-white hover:bg-primary-400"
                 variant="circle"
                 data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                 wire:click="$emitTo('user.user-page', 'edit',[{{$row->user_id}}])">
        <span class="flex items-center fi-rr-pencil"></span>
    </x-kit::button>
    <x-kit::button variant="circle" class="bg-danger-500 text-white hover:bg-danger-400"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                    wire:click="$emit('confirmDestroy', {{$row->user_id}})">
        <span class="flex items-center fi-rr-trash"></span>
    </x-kit::button>
</div>
