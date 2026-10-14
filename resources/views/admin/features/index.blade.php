<x-layouts.admin title="Features">
    <div class="mb-4">
        <a href="{{ route('admin.features.create') }}" class="inline-flex rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark"><i class="fa-solid fa-plus mr-2"></i>Add feature</a>
    </div>
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted">
                <tr>
                    <th class="px-4 py-3 font-medium">Image/Icon</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium">Type</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($features as $feature)
                    <tr class="border-t border-line">
                        <td class="px-4 py-3">
                            @if ($feature->image_path)
                                <img src="{{ asset($feature->image_path) }}" alt="" class="w-10 h-10 object-cover rounded">
                            @elseif ($feature->icon)
                                <span class="text-2xl">{{ $feature->icon }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-semibold">{{ $feature->title }}</td>
                        <td class="px-4 py-3">{{ $feature->type }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.features.edit', $feature) }}" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                            <form method="POST" action="{{ route('admin.features.destroy', $feature) }}" class="ml-3 inline" onsubmit="return confirm('Remove this feature?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-tomato hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-6 text-muted" colspan="4">No features yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
