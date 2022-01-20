<div>
    <div class="cursor-pointer p-3 border border-dashed border-gray-500 rounded">
        <label class="block w-full cursor-pointer" for="{!! $attributes->get('id') !!}">
            <span class="sr-only">{{$slot}}</span>
            <input type="file"
                   {!! $attributes !!}
                   x-data="{files: @entangle($attributes->wire('model'))}"
                   x-init="$watch('files',(val)=>{
                    if (!val){
                        document.querySelector('#{!! $attributes->get('id') !!}').value = '';
                    }
                })"
                   class="block w-full text-sm text-gray-500 cursor-pointer
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-full file:border-0 file:cursor-pointer
                      file:text-sm file:font-semibold
                      file:bg-blue-300 file:text-blue-700
                      hover:file:bg-blue-400"/>
        </label>
    </div>

    @error($attributes->wire('model')->value())
    <div class="text-red-500 font-normal text-sm py-1">{{ $message }}</div>
    @enderror
</div>
