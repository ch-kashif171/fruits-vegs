<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Feature;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('site.about', [
            'page' => Page::query()->forSlug('about')->firstOrFail(),
            'mission' => Feature::where('type', 'mission')->orderBy('sort_order')->first(),
            'vision' => Feature::where('type', 'vision')->orderBy('sort_order')->first(),
            'values' => Feature::where('type', 'value')->orderBy('sort_order')->get(),
        ]);
    }
}
