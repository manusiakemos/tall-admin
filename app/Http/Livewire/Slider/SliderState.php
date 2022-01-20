<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Illuminate\Support\Str;

trait SliderState
{
    public $previous;

    public $updateMode = false;

    public $showModalForm = false;

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
        $this->reset();
        $this->showModalForm = true;
    }

    public function store()
    {
        $rules = [
            "slider.slider_title" => [
                "required"
            ],
            "slider.slider_desc" => [
                "required"
            ],
            "slider.slider_image" => [
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
            $this->emitTo('slider.slider-page', 'refreshDt');
        } else {
            abort('403', 'Slider gagal ditambahkan');
        }
    }

    public function edit($id)
    {
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
            "slider.slider_image" => [
                "required"
            ],
            "slider.slider_active" => [
                "required"
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
            $this->emitTo('slider.slider-page', 'refreshDt');
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

    private function handleFormRequest($db): bool
    {
        try {
            $db->slider_title = $this->slider['slider_title'];
            $db->slider_desc = $this->slider['slider_desc'];
            if ($this->myFile) {
                $filename = Str::random() . "." . $this->myFile->getClientOriginalExtension();
                $this->myFile->storeAs('uploads', $filename, 'public');
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
