<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class MapPicker extends Component
{
    public $latitude = '-6.175110';

    public $longitude = '106.865036';

    public $locationName = 'Jakarta';

    public $radius = '100';

    public function setMap()
    {
        $this->emit("set_map", ['latitude' => $this->latitude, 'longitude' => $this->longitude, 'radius' => $this->radius]);
    }

    public function render()
    {
        return view('livewire.admin.map-picker');
    }
}
