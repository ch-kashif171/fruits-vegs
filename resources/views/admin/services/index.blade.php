<x-layouts.admin title="Services">
    <div class="mb-4">
        <a href="{{ route('admin.services.create') }}" class="inline-flex rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark"><i class="fa-solid fa-plus mr-2"></i>Add service</a>
    </div>
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <table class="w-full text-left text-sm">
            <thead class="bg-mist text-muted">
                <tr>
                    <th class="px-4 py-3 font-medium">Image</th>
                    <th class="px-4 py-3 font-medium">Title</th>
                    <th class="px-4 py-3 font-medium">Theme</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="border-t border-line">
                        <td class="px-4 py-3 font-semibold"> <img style="width: 50px" src="{{ asset($service->icon) }}"></td>
                        <td class="px-4 py-3 font-semibold"> {{ $service->title }}</td>
                        <td class="px-4 py-3 capitalize">{{ $service->theme }}</td>
                        <td class="px-4 py-3">{{ $service->is_active ? 'Active' : 'Hidden' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.services.edit', $service) }}" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="ml-3 inline" onsubmit="return confirm('Remove this service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-tomato hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-6 text-muted" colspan="4">No services yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
