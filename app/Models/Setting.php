<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SettingType;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'type', 'value'];

    protected $casts = [
        'type' => SettingType::class
    ];

    public static function get($key)
    {
        $setting = static::where('key', $key)->first();
        if(!$setting) return null;

        if($setting->type == SettingType::Boolean) return $setting->value == '1' ? true : false;

        return $setting->value;
    }
}