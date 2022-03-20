<div>

    <!-- Rounded Button -->
    <x-kit::button variant="rounded" wire:click="setMap"
                   class="bg-primary-500 hover:bg-primary-600 text-gray-100 font-sans text-sm">
        Set Map
    </x-kit::button>


    <x-kit::location-picker id="tall" lat="latitude" lng="longitude" radius="radius"/>
</div>
