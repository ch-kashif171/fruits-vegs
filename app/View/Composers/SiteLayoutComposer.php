<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SiteLayoutComposer
{
    public function compose(View $view): void
    {
        $settings = Setting::map();

        $view->with([
            'settings' => $settings,
            'logoPath' => $settings->get('logo_path') ?: '/images/logo.png',
            'siteName' => $settings->get('site_name') ?: 'Zahrat Al Madina',
            'tagline' => $settings->get('tagline') ?: 'Fruits & Vegetables',
            'salesTel' => Str::of((string) $settings->get('sales_phone', ''))->replaceMatches('/\s+/', '')->toString(),
            'officeTel' => Str::of((string) $settings->get('telephone', ''))->replaceMatches('/\s+/', '')->toString(),
        ]);
    }
}
