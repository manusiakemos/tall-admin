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
                      file:bg-primary-300 file:text-primary-700
                      hover:file:bg-primary-400"/>
        </label>
    </div>
</div>
