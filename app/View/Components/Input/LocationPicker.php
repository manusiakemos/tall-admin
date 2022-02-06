<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class LocationPicker extends Component
{
    public $lat;
    public $lng;
    public $radius;
    public $search;

    public function __construct($lat, $lng, $radius, $search)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->radius = $radius;
        $this->search = $search;
    }

    public function render()
    {
        return view('components.input.location-picker');
    }
}
