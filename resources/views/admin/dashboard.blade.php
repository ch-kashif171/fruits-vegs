<x-layouts.admin title="Dashboard">
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <a href="{{ route('admin.enquiries.index') }}" class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-line no-underline hover:ring-teal">
            <p class="text-sm text-muted">Enquiries</p>
            <p class="mt-2 font-serif text-3xl text-ink">{{ $enquiryCount }}</p>
            <p class="mt-1 text-sm text-teal-dark">{{ $unreadCount }} unread</p>
        </a>
        <a href="{{ route('admin.services.index') }}" class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-line no-underline hover:ring-teal">
            <p class="text-sm text-muted">Services</p>
            <p class="mt-2 font-serif text-3xl text-ink">{{ $serviceCount }}</p>
        </a>
        <a href="{{ route('admin.faqs.index') }}" class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-line no-underline hover:ring-teal">
            <p class="text-sm text-muted">FAQs</p>
            <p class="mt-2 font-serif text-3xl text-ink">{{ $faqCount }}</p>
        </a>
        <a href="{{ route('admin.pages.index') }}" class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-line no-underline hover:ring-teal">
            <p class="text-sm text-muted">Pages</p>
            <p class="mt-2 font-serif text-3xl text-ink">CMS</p>
        </a>
    </div>
</x-layouts.admin>
