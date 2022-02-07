<div class="my-3 pb-1">
    <label for="{{$key}}" class="text-sm text-gray-700 dark:text-gray-300">{{$label}}</label>
    {{$slot}}

    @error($model)
    <div class="text-danger-500 font-normal text-sm py-1">{{ $message }}</div>
    @enderror
</div>
