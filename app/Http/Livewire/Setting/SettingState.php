<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

trait SettingState
{
    use WithFileUploads;

    public $previous;

    public $updateMode = false;

    public $image;

    public $setting = [
        "setting_id" => "",
        "setting_key" => "",
        "setting_name" => "",
        "setting_value" => "",
        "setting_input" => "",
        "setting_order" => "",
        "setting_removable" => "",
    ];

    public $showAlert = false;

    public $alertMessage = '';

    public $showToast = false;

    public $toastMessage = 'Table refreshed';

    public $showModalForm = false;

    public $showModalConfirm = false;

    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin", "active" => false],
        ["link" => "#", "title" => "Setting", "active" => true],
    ];

    public $options = [
        'input_types' => [],
        'boolean' => [],
    ];

    public function create()
    {
        $this->reset(['setting', 'updateMode']);
        $this->showModalForm = true;
    }

    public function store()
    {
        $rules = [
            "setting.setting_name" => [
                "required"
            ],
            "setting.setting_input" => [
                "required"
            ],
            "setting.setting_removable" => [
                "required"
            ],
        ];
        $this->validate($rules);

        $this->updateMode = false;

        $save = $this->handleFormRequest(new Setting);

        if ($save) {
            $this->reset("setting");
            $this->showToast = true;
            $this->toastMessage = "Setting berhasil ditambahkan";
            $this->emit('refreshDt');
        } else {
            abort('403', 'Setting gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $setting = Setting::where('setting_id', $id)->first();
        $this->setting = $setting->toArray();
        $this->showModalForm = true;
    }

    public function update()
    {
        $rules = [
            "setting.setting_name" => [
                "required"
            ],
            "setting.setting_input" => [
                "required"
            ],
            "setting.setting_removable" => [
                "required"
            ],
        ];
        $this->validate($rules);


        $save = false;

        if ($this->setting["setting_id"]) {
            $db = Setting::find($this->setting["setting_id"]);
            $save = $this->handleFormRequest($db);
        } else {
            abort('403', 'Setting Not Found');
        }

        if ($save) {
            $this->reset("setting");
            $this->showToast = true;
            $this->toastMessage = "Setting berhasil diupdate";
            $this->emit('refreshDt');
        }
    }

    public function destroy($id)
    {
        $delete = Setting::destroy($id);
        if ($delete) {
            $this->showToast = true;
            $this->toastMessage = "Setting berhasil dihapus";
        } else {
            $this->showToast = true;
            $this->toastMessage = "Setting gagal dihapus";
        }

        $this->emit("refreshDt", false);
        $this->reset(['setting', 'updateMode', 'showModalConfirm']);
    }

    private function handleFormRequest($db): bool
    {
        try {
            $db->setting_name = $this->setting['setting_name'];
            if (!$this->updateMode){
                $db->setting_key = Str::snake($this->setting['setting_name'],"_");
                $db->setting_order = Setting::max("setting_order")+1;
            }
            $db->setting_input = $this->setting['setting_input'];

            $db->setting_removable = $this->setting['setting_removable'];

            if ($this->updateMode){
//with image intervention
                if ($this->image){
                    $basename = Str::random();
                    $image = $this->image;
                    $original = $basename . '.' . $image->getClientOriginalExtension();
                    $thumbnail = 'thumb_'.$basename .'.'. $image->getClientOriginalExtension();
                    Image::make($image)
                        ->resize(null, 100, function ($constraint){
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('/storage/settings/' . $thumbnail));
                    $db->setting_value = $original;
                    $image->storeAs("settings", $original,"public");
                }else{
                    $db->setting_value = $this->setting['setting_value'];
                }
            }

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
