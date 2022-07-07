@props(['inputId', 'textLabel', 'errorName'])
<div class="w-full mb-3">
    <label for="{{$inputId}}" class="text-sm text-gray-700 dark:text-gray-300">{{$textLabel}}</label>

    {{$slot}}

    @error($errorName)
    <div class="text-danger-500 dark:text-danger-400 font-normal text-sm py-1">{{ $message }}</div>
    @enderror
</div>
