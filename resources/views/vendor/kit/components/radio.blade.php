@props(['options', 'optionValue', 'optionText'])
<div class="flex">
    @foreach ($options as $key => $item)
        @php($id = \Illuminate\Support\Str::random(8))
        <div class="mr-3">
            <input
                wire:model="{{$attributes->get('wire:model')}}"
                type="radio"
                id="{{ $id }}"
                value="{{ $item[$optionValue] }}">
            <label for="{{ $id }}" class="text-gray-700 dark:text-gray-300">{{ $item[$optionText] }}</label>
        </div>
    @endforeach
</div>
