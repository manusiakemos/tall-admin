<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Editor extends Component
{

    public $text = '<table> <tr><td>1</td> <td>2</td></tr> </table>';

    public function render()
    {
        return view('livewire.admin.editor');
    }

    public function save()
    {
        #you can dump output here

        #emit prism js
        $this->emit('prism');
    }

}
