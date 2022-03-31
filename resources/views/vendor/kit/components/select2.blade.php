@props(['options'])
<div
    {!! $attributes->merge(['class'=>'relative']) !!}
    wire:ignore
    x-data="{
        selected: @entangle($attributes->wire('model')),
        options: @js($options)
    }"
    x-init="
        $nextTick(() => {
            this.select2 = $($refs.select).select2({
                dropdownParent: $('#{{$attributes->get('dropdown-parent')}}')
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
