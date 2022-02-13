<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $setting_id
 * @property string|null $setting_key
 * @property string|null $setting_name
 * @property string|null $setting_value
 * @property string|null $setting_input
 * @property int|null $setting_order
 * @property int $setting_removable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingInput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingRemovable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{

    public static $setting_removable_options = [
        [
            "value" => "1",
            "text" => "Ya",
        ],
        [
            "value" => "0",
            "text" => "Tidak",
        ]
    ];

    use HasFactory;

    protected $guarded = [];

    protected $table = "setting";

    protected $primaryKey = "setting_id";


}
