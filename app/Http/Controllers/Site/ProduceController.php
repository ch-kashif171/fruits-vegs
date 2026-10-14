<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ProduceItem;
use Illuminate\View\View;

class ProduceController extends Controller
{
    public function index(): View
    {
        return view('site.fruits-and-vegetables', [
            'page' => Page::query()->forSlug('fruits-and-vegetables')->firstOrFail(),
            'fruits' => ProduceItem::query()->category('fruit')->active()->ordered()->get(),
            'vegetables' => ProduceItem::query()->category('vegetable')->active()->ordered()->get(),
        ]);
    }
}
