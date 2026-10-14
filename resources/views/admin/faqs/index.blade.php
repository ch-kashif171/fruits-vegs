<x-layouts.admin title="FAQs">
    <div class="mb-4">
        <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark transition-colors"><i class="fa-solid fa-plus mr-2"></i> Add FAQ</a>
    </div>
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted border-b border-line">
                <tr>
                    <th class="px-4 py-3 font-medium">Question</th>
                    <th class="px-4 py-3 font-medium">Sort Order</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faqs as $faq)
                    <tr class="border-b border-line last:border-0 hover:bg-mist/50 transition-colors">
                        <td class="px-4 py-4 font-semibold text-ink"><i class="fa-solid fa-circle-question text-teal-dark/50 mr-2"></i> {{ $faq->question }}</td>
                        <td class="px-4 py-4 text-muted">{{ $faq->sort_order }}</td>
                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="font-semibold text-teal hover:text-teal-dark transition-colors"><i class="fa-solid fa-pen-to-square mr-1"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="ml-3 inline" onsubmit="return confirm('Remove this FAQ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-red-500 hover:text-red-700 transition-colors"><i class="fa-solid fa-trash mr-1"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-12 text-muted text-center" colspan="3"><i class="fa-solid fa-folder-open text-3xl mb-3 block text-line"></i> No FAQs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
