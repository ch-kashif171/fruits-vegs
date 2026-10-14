@php
    $service = $service ?? null;
@endphp

<div>
    <label for="title" class="mb-1 block text-sm font-semibold">Title</label>
    <input id="title" name="title" value="{{ old('title', $service?->title) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="icon" class="mb-1 block text-sm font-semibold">Image</label>
    <input type="file" id="icon" name="icon" accept="image/*" class="w-full rounded-md border border-line px-3 py-2">
    @if($service?->icon)
        <p class="mt-2 text-sm text-muted">Current image: <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}" class="mt-1 h-20 w-auto rounded"></p>
    @endif
    @error('icon') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="theme" class="mb-1 block text-sm font-semibold">Theme</label>
    <select id="theme" name="theme" class="w-full rounded-md border border-line px-3 py-2">
        @foreach (['import' => 'Import (green)', 'export' => 'Export (teal)', 'wholesale' => 'Wholesale (orange)'] as $value => $label)
            <option value="{{ $value }}" @selected(old('theme', $service?->theme) === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('theme') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="excerpt" class="mb-1 block text-sm font-semibold">Short excerpt</label>
    <textarea id="excerpt" name="excerpt" rows="2" class="w-full rounded-md border border-line px-3 py-2">{{ old('excerpt', $service?->excerpt) }}</textarea>
    @error('excerpt') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="body" class="mb-1 block text-sm font-semibold">Full description</label>
    <textarea id="body" name="body" rows="5" class="w-full rounded-md border border-line px-3 py-2">{{ old('body', $service?->body) }}</textarea>
    @error('body') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="sort_order" class="mb-1 block text-sm font-semibold">Sort order</label>
    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $service?->sort_order ?? 0) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('sort_order') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service?->is_active ?? true))>
    Visible on the website
</label>
