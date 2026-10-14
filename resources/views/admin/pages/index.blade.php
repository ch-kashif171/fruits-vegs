<x-layouts.admin title="Pages">
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted">
                <tr>
                    <th class="px-4 py-3 font-medium">Page</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr class="border-t border-line">
                        <td class="px-4 py-3 font-semibold capitalize">{{ $page->slug }}</td>
                        <td class="px-4 py-3">{{ $page->title }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.admin>
