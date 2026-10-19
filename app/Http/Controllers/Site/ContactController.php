<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnquiryRequest;
use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        $enquiry = Enquiry::query()->create($request->validated());

        try {
            Mail::to(config('mail.admin_email'))->send(new EnquiryReceived($enquiry));
        } catch (\Throwable $e) {
            Log::error('Enquiry email failed: ' . $e->getMessage(), [
                'enquiry_id' => $enquiry->id,
            ]);
        }

        return redirect()->to(url()->previous() . '#contact-us')
            ->with('success', 'Thanks — we received your message and will reply soon.');
    }
}
