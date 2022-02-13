$rules = [
@foreach($field_validate as $field)
    "{{$classNameLower}}.{{$field['name']}}" => [
        "required"
    ],
@endforeach
];
$this->validate($rules);
