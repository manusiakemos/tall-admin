<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Illuminate\Support\Str;

trait SliderState
{
    public $previous;

    public $image;

    public $updateMode = false;

    public $showModalForm = false;

    public $options = [
      "slider_active" => []
    ];

    public array $slider = [
        "slider_id" => "",
        "slider_title" => "",
        "slider_desc" => "",
        "slider_image" => "",
        "slider_active" => 1,
    ];

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Slider"],
    ];

    public function save()
    {
        $this->updateMode ? $this->update() : $this->store();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->reset(['slider', 'updateMode']);
        $this->image = null;
        $this->showModalForm = true;
    }

    public function store()
    {
        $rules = [
            "image" => [
                "required", "image"
            ],
            "slider.slider_title" => [
                "required"
            ],
            "slider.slider_desc" => [
                "required"
            ],
            "slider.slider_active" => [
                "required"
            ],
        ];
        $this->validate($rules);

        $this->updateMode = false;

        $save = $this->handleFormRequest(new Slider);

        if ($save) {
            $this->reset("slider");
            $this->emit('showToast', ["message" => "Slider berhasil ditambahkan", "type" => "success", "reload" => false]);
            $this->emit( 'refreshDt');
        } else {
            abort('403', 'Slider gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $this->reset(['slider', 'updateMode', 'image']);
        $this->updateMode = true;
        $slider = Slider::where('slider_id', $id)->first();
        $this->slider = $slider->toArray();
        $this->showModalForm = true;
    }

    public function update()
    {
        $rules = [
            "slider.slider_title" => [
                "required"
            ],
            "slider.slider_desc" => [
                "required"
            ],
            "slider.slider_active" => [
                "required"
            ],
            "image" => [
                "nullable", "image"
            ],
        ];
        $this->validate($rules);


        $save = false;

        if ($this->slider["slider_id"]) {
            $db = Slider::find($this->slider["slider_id"]);
            $save = $this->handleFormRequest($db);
        } else {
            abort('403', 'Slider Not Found');
        }

        if ($save) {
            $this->reset("slider");
            $this->emit('showToast', ["message" => "Slider berhasil diupdate", "type" => "success", "reload" => false]);
            $this->emit('refreshDt');
        }
    }

    public function destroy($id)
    {
        $delete = Slider::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Sliders Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(Slider $db): bool
    {
        try {
            $db->slider_title = $this->slider['slider_title'];
            $db->slider_desc = $this->slider['slider_desc'];
            if ($this->image) {
                $filename = Str::random() . "." . $this->image->getClientOriginalExtension();
                $this->image->storeAs('uploads', $filename, 'public');
                $db->slider_image = $filename;
            }
            $db->slider_active = $this->slider['slider_active'];

            return $db->save();
        } catch (\Exception $e) {
            return $e->getTraceAsString();
        }
    }

    public function back()
    {
        redirect($this->previous);
    }


}
