@foreach($fields as $field)
    @if($field['htmlType'] == 'file' || $field['htmlType'] == 'image')
        if($this->myFile){
            $filename = Str::random().".".$this->myFile->getClientOriginalExtension();
            $this->myFile->storeAs('uploads/{{$classNameLower}}', $filename, 'public');
            $db->{{$field['name']}} = $filename;
        }
    @else
        $db->{{$field['name']}} = $this->{{$classNameLower}}['{{$field['name']}}'];
    @endif
@endforeach
