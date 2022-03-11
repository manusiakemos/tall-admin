<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

trait SliderState
{
    use WithFileUploads;

    public $previous;

    public $updateMode = false;

    public $myFile;

    public array $slider = [
        "slider_id" => "",
        "slider_title" => "",
        "slider_desc" => "",
        "slider_image" => "",
        "slider_active" => "0",
    ];

    public $showAlert = false;

    public $alertMessage = '';

    public $showToast = false;

    public $toastMessage = 'Table refreshed';

    public $showModalForm = false;

    public $showModalConfirm = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin", "active" => false],
        ["link" => "#", "title" => "Slider", "active" => true],
    ];

    public $options = [
        "slider_active" => []
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
            $this->showToast = true;
            $this->toastMessage = "Slider berhasil ditambahkan";
            $this->emit('refreshDt');
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
            $this->showToast = true;
            $this->toastMessage = "Slider berhasil diupdate";
            $this->emit('refreshDt');
        }
    }

    public function destroy($id)
    {
        $delete = Slider::destroy($id);
        if ($delete) {
            $this->showToast = true;
            $this->toastMessage = "Slider berhasil dihapus";
        } else {
            $this->showToast = true;
            $this->toastMessage = "Slider gagal dihapus";
        }

        $this->emit("refreshDt", false);
        $this->reset(['slider', 'updateMode', 'showModalConfirm']);
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
