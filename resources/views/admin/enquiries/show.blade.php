<x-layouts.admin title="View Enquiry">
    <div class="mb-4">
        <a href="{{ route('admin.enquiries.index') }}" class="text-sm font-semibold text-teal hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Back to Enquiries</a>
    </div>
    
    <div class="max-w-2xl overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <div class="border-b border-line p-6 bg-mist/30">
            <h2 class="font-serif text-2xl text-forest">{{ $enquiry->name }}</h2>
            <div class="mt-4 flex flex-wrap gap-4 text-sm text-muted">
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-envelope text-teal-dark"></i> <a href="mailto:{{ $enquiry->email }}" class="hover:underline">{{ $enquiry->email }}</a></div>
                @if($enquiry->phone)
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-phone text-teal-dark"></i> <a href="tel:{{ $enquiry->phone }}" class="hover:underline">{{ $enquiry->phone }}</a></div>
                @endif
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-calendar-day text-teal-dark"></i> {{ $enquiry->created_at->format('M d, Y - g:i A') }}</div>
            </div>
        </div>
        <div class="p-6">
            <h3 class="mb-3 text-sm font-semibold text-ink uppercase tracking-wider">Message</h3>
            <div class="prose prose-sm max-w-none text-muted">
                {!! nl2br(e($enquiry->message)) !!}
            </div>
        </div>
        <div class="border-t border-line p-6 bg-mist/20 flex justify-between items-center">
            <span class="text-xs text-muted"><i class="fa-solid fa-check-double text-teal mr-1"></i> Marked as read at {{ $enquiry->read_at->format('g:i A') }}</span>
            <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-md bg-red-50 text-red-600 px-4 py-2 text-sm font-semibold hover:bg-red-100 transition-colors"><i class="fa-solid fa-trash mr-1"></i> Delete Enquiry</button>
            </form>
        </div>
    </div>
</x-layouts.admin>
