<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    function setting($key)
    {
        return Setting::get($key);
    }
}