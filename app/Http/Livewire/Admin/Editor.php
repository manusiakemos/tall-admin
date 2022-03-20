<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Editor extends Component
{

    public $text = '<p></p><img class="img-responsive" src="https://tall-admin.test/storage/files/1/css.png"><blockquote><p>my name is john doe</p></blockquote>';

    public function render()
    {
        return view('livewire.admin.editor');
    }

    public function save()
    {
    }

}
