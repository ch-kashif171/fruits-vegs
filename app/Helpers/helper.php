<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    /**
     * setting('site_name')            -> get a value
     * setting('site_name', 'Default') -> get with default
     * setting(['site_name' => 'X'])   -> set values
     * setting()                       -> get all settings
     */
    function setting($key = null, $default = null)
    {
        $all = Cache::rememberForever('settings', function () {
            try {
                return Setting::pluck('value', 'key')->toArray();
            } catch (\Throwable $e) {
                return []; // table not migrated yet
            }
        });

        if (is_null($key)) {
            return $all;
        }

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                Setting::updateOrCreate(['key' => $k], ['value' => $v]);
            }
            Cache::forget('settings');
            return true;
        }

        return $all[$key] ?? $default;
    }
}
