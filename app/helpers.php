<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    function setting($key)
    {
        if(config('app.env') == 'local' && request() && request()->query($key)) return request()->query($key);
        return Setting::get($key);
    }
}