<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Enquiry;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('site.contact', [
            'page' => Page::query()->forSlug('contact')->firstOrFail(),
        ]);
    }

    public function store(StoreEnquiryRequest $request): RedirectResponse
    {
        Enquiry::query()->create($request->validated());

        return back()->with('status', 'Thanks — we received your message and will reply soon.');
    }
}
