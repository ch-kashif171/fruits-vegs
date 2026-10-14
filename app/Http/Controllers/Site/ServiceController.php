<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('site.services', [
            'page' => Page::query()->forSlug('services')->firstOrFail(),
            'services' => Service::query()->active()->ordered()->get(),
            'faqs' => Faq::query()->ordered()->get(),
        ]);
    }
}
