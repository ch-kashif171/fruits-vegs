<x-layouts.admin title="Enquiries">
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted border-b border-line">
                <tr>
                    <th class="px-4 py-3 font-medium">Name</th>
                    <th class="px-4 py-3 font-medium">Email</th>
                    <th class="px-4 py-3 font-medium">Date</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enquiries as $enquiry)
                    <tr class="border-b border-line last:border-0 hover:bg-mist/50 transition-colors {{ !$enquiry->read_at ? 'bg-orange/5' : '' }}">
                        <td class="px-4 py-4 font-semibold text-ink">
                            {{ $enquiry->name }}
                        </td>
                        <td class="px-4 py-4 text-muted"><a href="mailto:{{ $enquiry->email }}" class="hover:underline">{{ $enquiry->email }}</a></td>
                        <td class="px-4 py-4 text-muted">{{ $enquiry->created_at->format('M d, Y - H:i') }}</td>
                        <td class="px-4 py-4">
                            @if($enquiry->read_at)
                                <span class="inline-flex items-center gap-1 rounded-full bg-mist px-2.5 py-0.5 text-xs font-medium text-muted"><i class="fa-solid fa-envelope-open text-[10px]"></i> Read</span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-orange px-2.5 py-0.5 text-xs font-medium text-white shadow-sm"><i class="fa-solid fa-envelope text-[10px]"></i> Unread</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="font-semibold text-teal hover:text-teal-dark transition-colors"><i class="fa-solid fa-eye mr-1"></i> View</a>
                            <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" class="ml-3 inline" onsubmit="return confirm('Delete this enquiry?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-red-500 hover:text-red-700 transition-colors"><i class="fa-solid fa-trash mr-1"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-12 text-muted text-center" colspan="5"><i class="fa-solid fa-inbox text-3xl mb-3 block text-line"></i> No enquiries yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
