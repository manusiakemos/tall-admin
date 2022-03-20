<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $setting_id
 * @property string $setting_key
 * @property string $setting_name
 * @property int|null $setting_order
 * @property string|null $setting_input
 * @property string|null $setting_value
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

    use HasFactory;

    protected $guarded = [];

    protected $table = "setting";

    protected $primaryKey = "setting_id";

    public static $options = [
        'input_types' => [
            [
                'value' => 'text',
                'text' => 'text',
            ],
            [
                'value' => 'textarea',
                'text' => 'textarea',
            ],
            [
                'value' => 'switch',
                'text' => 'switch',
            ],
            [
                'value' => 'file',
                'text' => 'file',
            ]
        ],
        'boolean' => [
            [
                'value' => '1',
                'text' => 'yes',
            ],
            [
                'value' => '0',
                'text' => 'no',
            ]
        ]
    ];


}
