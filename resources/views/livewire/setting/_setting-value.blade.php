@if($row->setting_input == 'text')
    {{$row->setting_value}}
@elseif($row->setting_input == 'radio' || $row->setting_input == 'switch')
    {{boolean_text($row->setting_value, "Ya", "Tidak")}}
@elseif($row->setting_input == 'file')
    <a href="{{ asset('storage/settings/'.$row->setting_value) }}"
       target="_blank"
       class="underline hover:text-primary-500">Lihat Gambar</a>
@endif
