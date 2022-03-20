<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Livewire\Component;

class SliderForm extends Component
{
    //public $image;
    //public $myFile;

    //use WithFileUploads;

    public $type;


    use SliderState;

    public function mount($slider_id = null)
    {
        $this->previous = url()->previous();
        $this->options['slider_active'] = Slider::$slider_active_options;

        if ($slider_id) {
            $this->edit($slider_id);
        }

        $this->breadcrumbs = [
            ["link" => "#", "title" => "Admin", "active" => false],
            ["link" => route('slider'), "title" => "Slider", "active" => false],
            ["link" => url('/'), "title" => "Slider Form", "active" => false],
        ];

        session()->put('active', 'slider');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        if (count($this->getErrorBag()->all()) > 0) {
            $this->toastMessage = 'Please fix the errors below.';
            $this->showToast = true;
        }
        return view('livewire.slider.slider-form')
            ->layout('layouts.admin');
    }
}
