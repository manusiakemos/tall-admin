<div
    wire:ignore
    {!! $attributes->merge(['class'=>'relative']) !!}
    x-data="{
        select2 : null,
        selected: @entangle($attributes->wire('model')),
    }"
    x-init="
        $nextTick(() => {
            this.select2 = $($refs.select).select2({
                dropdownParent: $('#{{$attributes->get('dropdown-parent')}}'),
                placeholder: '{{$attributes->get('placeholder') ?? 'Select an option'}}',
            });
            this.select2.on('select2:select', (event) => {
                selected = event.target.value;
            });
            $watch('selected', (value) => {
                this.select2.val(value).trigger('change');
            });
        });
    ">
    <select
        x-model="selected"
        x-ref="select">
        <option value="">
            {{ $attributes->get('placeholder') ?? 'choose one' }}
        </option>
        {{$slot}}
    </select>
</div>

@once
    @push("stylesBefore")
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush

    @push("scripts")
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush
@endonce
