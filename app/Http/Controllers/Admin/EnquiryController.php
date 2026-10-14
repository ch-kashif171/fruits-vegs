<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(): View
    {
        return view('admin.enquiries.index', [
            'enquiries' => Enquiry::query()->latest()->orderByDesc('id')->get(),
        ]);
    }

    public function show(Enquiry $enquiry): View
    {
        $enquiry->markRead();

        return view('admin.enquiries.show', [
            'enquiry' => $enquiry->fresh(),
        ]);
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with('status', 'Enquiry deleted.');
    }
}
