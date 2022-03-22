<div>

    <div class="py-3">
        <x-kit::editor wire:model.defer="text"/>
    </div>

    <div class="py-3">
        <pre><code class="language-html">{{$text}}</code></pre>
    </div>

    <div class="py-3">
        <x-kit::button
            variant="rounded"
            class="bg-primary-500 text-white w-full"
            wire:click="save">Save</x-kit::button>
    </div>

</div>

@push('scripts')
    <script src="{{ asset('vendor/prism/prism.js') }}"></script>
    <script>
        Livewire.on('prism', () => {
            Prism.highlightAll();
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/prism/prism.css') }}">
@endpush
