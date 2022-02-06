$rules = [
@foreach($field_validate as $field)
    "{{$classNameLower}}.{{$field['name']}}" => [
        "requidanger"
    ],
@endforeach
];
$this->validate($rules);
