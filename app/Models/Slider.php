<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    public static $slider_active_options = [
        [
            "value" => "1",
            "text" => "Aktif",
        ],
        [
            "value" => "0",
            "text" => "Nonaktif",
        ],
    ];

    use HasFactory;

    protected $guarded = [];

    protected $table = "sliders";

    protected $primaryKey = "slider_id";

}
