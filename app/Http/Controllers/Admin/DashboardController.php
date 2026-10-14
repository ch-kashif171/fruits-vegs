<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'enquiryCount' => Enquiry::query()->count(),
            'unreadCount' => Enquiry::query()->whereNull('read_at')->count(),
            'serviceCount' => Service::query()->count(),
            'faqCount' => Faq::query()->count(),
        ]);
    }
}
