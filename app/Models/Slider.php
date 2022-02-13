<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SliderMenu
 *
 * @property int $slider_id
 * @property string|null $slider_title
 * @property string|null $slider_desc
 * @property string|null $slider_image
 * @property int|null $slider_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereSliderActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereSliderDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereSliderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereSliderTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
