@props(['placeholder' => 'Pilih salah satu', 'options', 'optionValue', 'optionText'])
<select {!! $attributes->merge(['class' => 'mt-1 block w-full rounded-md
                                            dark:bg-gray-600 bg-gray-200
                                            border-transparent focus:border-secondary-400
                                            focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0
                                            text-sm text-gray-700 dark:text-gray-300']) !!}>
    <option value="">{{$placeholder}}</option>
    @foreach($options as $option)
        <option value="{{ $option[$optionValue] }}">
                {{ $option[$optionText] }}
        </option>
    @endforeach
</select>

