@props(['id'])
<x-kit::modal position="center" id="{{ $id }}" max-width="sm" wire:model="{{$attributes->get('wire:model')}}">
    <div class="mx-6 my-3 flex flex-col justify-center items-center overflow-auto">
        <div class="flex flex-col items-center justify-center">
            <h4 class="font-semibold text-xl md:text-3xl dark:text-gray-100 text-gray-500 text-center mb-3">
                {{ $title ?? 'Are you sure?' }}
            </h4>
            {{ $text ?? '' }}
        </div>
        <div class="flex flex-grow w-full pt-12 md:px-6 md:mx-6">
           {{ $yes ?? '' }}
           {{ $no ?? '' }}
        </div>
    </div>
</x-kit::modal>
