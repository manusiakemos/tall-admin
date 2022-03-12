<?php


namespace App\Http\Livewire\Slider;


use App\Models\Slider;
use Livewire\Component;

class SliderPage extends Component
{
    use SliderState;

    protected $listeners = ['create', 'edit'];

    public function mount()
    {
        $this->options['slider_active'] =  Slider::$slider_active_options;
        session()->put('active', 'slider');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.slider.slider-page')
            ->layout('layouts.admin');
    }

}
