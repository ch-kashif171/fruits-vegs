<x-layouts.admin title="Sliders">
    <div class="mb-4">
        <a href="{{ route('admin.sliders.create') }}" class="inline-flex rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark"><i class="fa-solid fa-plus mr-2"></i>Add slider</a>
    </div>
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted">
                <tr>
                    <th class="px-4 py-3 font-medium">Image</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sliders as $slider)
                    <tr class="border-t border-line">
                        <td class="px-4 py-3">
                            @if ($slider->image_path)
                                <img src="{{ asset($slider->image_path) }}" alt="" class="w-16 h-10 object-cover rounded">
                            @endif
                        </td>
                        <td class="px-4 py-3 font-semibold">{{ $slider->title }}</td>
                        <td class="px-4 py-3">{{ $slider->is_active ? 'Active' : 'Hidden' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                            <form method="POST" action="{{ route('admin.sliders.destroy', $slider) }}" class="ml-3 inline" onsubmit="return confirm('Remove this slider?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-tomato hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-6 text-muted" colspan="4">No sliders yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
