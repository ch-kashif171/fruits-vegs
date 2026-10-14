<x-layouts.admin title="Produce">
    <div class="mb-6 flex flex-wrap gap-3">
        <a href="{{ route('admin.produce-items.create', ['category' => 'fruit']) }}" class="inline-flex items-center gap-2 rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark">
            <i class="fa-solid fa-plus"></i> Add Fruit
        </a>
        <a href="{{ route('admin.produce-items.create', ['category' => 'vegetable']) }}" class="inline-flex items-center gap-2 rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark">
            <i class="fa-solid fa-plus"></i> Add Vegetable
        </a>
        <a href="{{ route('admin.produce-items.create', ['category' => 'other']) }}" class="inline-flex items-center gap-2 rounded-md bg-muted/30 px-4 py-2 text-sm font-semibold text-ink hover:bg-muted/50">
            <i class="fa-solid fa-plus"></i> Add Other
        </a>
    </div>

    @foreach ([['Fruits', $fruits, 'fruit'], ['Vegetables', $vegetables, 'vegetable'], ['Other', $others, 'other']] as [$sectionTitle, $sectionItems, $sectionCategory])
        <div class="mb-6">
            <h2 class="mb-2 font-serif text-lg font-semibold">{{ $sectionTitle }}</h2>
            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
                <table class="w-full text-left text-sm">
                    <thead class="bg-mist text-muted">
                        <tr>
                            <th class="px-4 py-3 font-medium">Image</th>
                            <th class="px-4 py-3 font-medium">Name</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                            <th class="px-4 py-3 font-medium"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sectionItems as $item)
                            <tr class="border-t border-line">
                                <td class="px-4 py-3">
                                    @if ($item->image_path)
                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="h-10 w-10 rounded object-cover">
                                    @else
                                        <span class="flex h-10 w-10 items-center justify-center rounded bg-mist text-xl text-muted">
                                          @if($item->icon)
                                                {{$item->icon}}
                                            @else
                                            <i class="fa-solid fa-image"></i>
                                            @endif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold">{{ $item->name }}</td>
                                <td class="px-4 py-3">
                                    @if ($item->status == 1)
                                        <span style="display:inline-block; padding:4px 10px; background-color:#dcfce7; color:#15803d; border-radius:9999px; font-size:12px; font-weight:600;">
            Active
        </span>
                                    @else
                                        <span style="display:inline-block; padding:4px 10px; background-color:#fee2e2; color:#b91c1c; border-radius:9999px; font-size:12px; font-weight:600;">
            Inactive
        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.produce-items.edit', $item) }}" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                                    <form method="POST" action="{{ route('admin.produce-items.destroy', $item) }}" class="ml-3 inline" onsubmit="return confirm('Remove this produce item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold text-tomato hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td class="px-4 py-6 text-muted" colspan="4">No {{ strtolower($sectionTitle) }} yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</x-layouts.admin>
