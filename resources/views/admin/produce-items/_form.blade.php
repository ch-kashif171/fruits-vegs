@php
    $item = $item ?? null;
    $defaultCategory = $defaultCategory ?? 'other';
@endphp

<div>
    <label for="name" class="mb-1 block text-sm font-semibold">Name</label>
    <input id="name" name="name" value="{{ old('name', $item?->name) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('name') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="category" class="mb-1 block text-sm font-semibold">Category</label>
    <select id="category" name="category" class="w-full rounded-md border border-line px-3 py-2">
        @foreach (['fruit' => 'Fruit', 'vegetable' => 'Vegetable', 'other' => 'Other'] as $value => $label)
            <option value="{{ $value }}" @selected(old('category', $item?->category ?? $defaultCategory) === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('category') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="image_path" class="mb-1 block text-sm font-semibold">Image</label>
    <input type="file" id="image_path" name="image_path" accept="image/*" class="w-full rounded-md border border-line px-3 py-2">
    @if($item?->image_path)
        <p class="mt-2 text-sm text-muted">Current image: <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" class="mt-1 h-20 w-auto rounded"></p>
    @else
        @if(!empty($item->icon))
            <p class="mt-2 text-sm text-muted">Icon: <span style="font-size: 24px">{{$item->icon}}</span></p>
        @else
            <i class="fa-solid fa-image"></i>
        @endif
    @endif
    @error('image_path') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>

<div>
    <label for="sort_order" class="mb-1 block text-sm font-semibold">Sort order</label>
    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $item?->sort_order ?? 0) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('sort_order') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>

<div>
    <label for="status" class="mb-1 block text-sm font-semibold">Status</label>
    <select id="status" name="status" class="w-full rounded-md border border-line px-3 py-2">
        @if(empty($item?->status) && is_null($item?->status))
            <option value="1" selected>Active</option>
        @else
            <option value="1" {{old('status', $item?->status) == 1 ? 'selected' : ''}}>Active</option>
            <option value="0" {{old('status', $item?->status) == 0 ? 'selected' : ''}}>InActive</option>
        @endif

    </select>
    @error('status') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>

