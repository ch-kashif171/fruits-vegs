@php
    $feature = $feature ?? null;
@endphp

<div>
    <label for="type" class="mb-1 block text-sm font-semibold">Type</label>
    <input id="type" name="type" value="{{ old('type', $feature?->type) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('type') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="title" class="mb-1 block text-sm font-semibold">Title</label>
    <input id="title" name="title" value="{{ old('title', $feature?->title) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="description" class="mb-1 block text-sm font-semibold">Description</label>
    <textarea id="description" name="description" rows="3" class="w-full rounded-md border border-line px-3 py-2">{{ old('description', $feature?->description) }}</textarea>
    @error('description') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="icon" class="mb-1 block text-sm font-semibold">Icon (emoji)</label>
    <input id="icon" name="icon" value="{{ old('icon', $feature?->icon) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('icon') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="image_path" class="mb-1 block text-sm font-semibold">Image</label>
    <input type="file" id="image_path" name="image_path" class="w-full rounded-md border border-line px-3 py-2">
    @if($feature?->image_path)
        <p class="mt-2 text-sm text-muted">Current image: <img src="{{ asset($feature->image_path) }}" class="mt-1 h-20 w-auto rounded"></p>
    @endif
    @error('image_path') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="sort_order" class="mb-1 block text-sm font-semibold">Sort order</label>
    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $feature?->sort_order ?? 0) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('sort_order') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
