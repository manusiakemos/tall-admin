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
