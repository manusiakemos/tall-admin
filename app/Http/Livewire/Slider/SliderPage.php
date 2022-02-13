<?php


namespace App\Http\Livewire\Slider;


use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderPage extends Component
{
    use SliderState, WithFileUploads;

    protected $listeners = ['create', 'edit'];

    public function mount()
    {
        session()->put('active', 'slider');
        session()->put('expanded', 'admin');

        $this->options['slider_active'] = Slider::$slider_active_options;
    }

    public function render()
    {
        return view('livewire.slider.slider-page')
            ->layout('layouts.admin', ['htmlTitle'=>'Slider']);
    }

}
