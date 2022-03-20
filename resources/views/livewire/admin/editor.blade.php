<div>

    <x-kit::editor
        wire:model.defer="text"
    ></x-kit::editor>

    <div
        class="py-6 text-gray-700 dark:text-gray-300"
        x-data="
        {
            text : @entangle('text'),
        }"
        x-init="
        $watch('text', function() {
          Prism.highlightAll();
        })"
        wire:ignore
    >
        <h4 class="heading mb-3">Raw Result</h4>

        <pre><code class="language-html" x-text="text"></code></pre>

    </div>

    <div class="prose dark:prose-invert bg-white max-w-none dark:bg-gray-900 py-3 px-6">
        {!! $text !!}
    </div>


    <x-kit::button
        variant="rounded"
        class="bg-primary-500 text-white"
        wire:click="save">Save</x-kit::button>

</div>

@push('scripts')
    <script src="{{ asset('vendor/prism/prism.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/prism/prism.css') }}">
@endpush
