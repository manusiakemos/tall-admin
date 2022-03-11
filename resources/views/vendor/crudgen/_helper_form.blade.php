@foreach($fields as $field)
    <xxx-kit::form-group text-label="{{$field['label']}}" input-id="{{$field['name']}}" error-name="{{$model}}.{{$field['name']}}">
        @switch($field['htmlType'])
            @case("file")
            <xxx-kit::file-upload id="{{$field['name']}}" wire:model="myFile"/>
            @break

            @case("date")
            <xxx-kit::input type="date" id="{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}"/>
            @break

            @case("time")
            <xxx-kit::input type="datetime-local" id="{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}"/>
            @break

            @case("summernote")
            <xxx-input::input data-event-name="set_summernote_value" id="{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}"/>
            @break

            @case("select")
            <xxx-kit::select-search  placeholder="Pilih salah satu"
                                   id="{{ $field['name'] }}"
                                   wire:model="{{$model}}.{{$field['name']}}"
                                  :options="{{__('$options')}}['{{$field['name']}}']"
                                  option-value="value"
                                  option-text="text"/>
            @break

            @case("radio")
            <xxx-kit::radio  wire:model.defer="{{$model}}.{{$field['name']}}"
                             :options="{{__('$options')}}['{{$field['name']}}']"
                             option-value="value"
                             option-text="text"/>
            @break

            @default
            <xxx-kit::input id="{{$field['name']}}" wire:model.defer="{{$model}}.{{$field['name']}}"/>
            @break
        @endswitch
    </xxx-kit::form-group>

@endforeach
