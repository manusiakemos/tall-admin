<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                'value' => 'radio',
                'text' => 'radio',
            ],
            [
                'value' => 'select',
                'text' => 'select',
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
