<?php

namespace App\View\Components\Traits;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;

trait RadioOptionsTrait {

    private function role()
    {
        $this->text = "text";
        $this->value = "value";
        $this->placeholder = "Please Select A Role ...";
        return User::$role_options;
    }

    private function bool()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return [
            [
                "value" => "1",
                "text" => "Ya",
            ],
            [
                "value" => "0",
                "text" => "Tidak",
            ]
        ];
    }

    private function select_slider_active()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return Slider::$slider_active_options;
    }

    private function select_setting_removable()
    {
        $this->value = "value";
        $this->text = "text";
        $this->placeholder = "";
        return Setting::$setting_removable_options;
    }

}
