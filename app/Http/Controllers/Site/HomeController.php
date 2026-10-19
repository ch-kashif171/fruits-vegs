<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ProduceItem;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Feature;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('site.home', [
            'page' => Page::query()->forSlug('home')->firstOrFail(),
            'services' => Service::query()->active()->ordered()->get(),
            'produceItems' => ProduceItem::query()->active()->ordered()->take(6)->get(),
            'sliders' => Slider::where('is_active', true)->orderBy('sort_order')->get(),
            'homeStats' => Feature::where('type', 'stat')->orderBy('sort_order')->get(),
            'homeExports' => Feature::where('type', 'home_export')->orderBy('sort_order')->get(),
        ]);
    }
}
