@php
    $slider = $slider ?? null;
@endphp

<div>
    <label for="title" class="mb-1 block text-sm font-semibold">Title</label>
    <input id="title" name="title" value="{{ old('title', $slider?->title) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="subtitle" class="mb-1 block text-sm font-semibold">Subtitle</label>
    <input id="subtitle" name="subtitle" value="{{ old('subtitle', $slider?->subtitle) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('subtitle') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="button_text" class="mb-1 block text-sm font-semibold">Button Text</label>
    <input id="button_text" name="button_text" value="{{ old('button_text', $slider?->button_text) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('button_text') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="button_link" class="mb-1 block text-sm font-semibold">Button Link</label>
    <input id="button_link" name="button_link" value="{{ old('button_link', $slider?->button_link) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('button_link') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="image_path" class="mb-1 block text-sm font-semibold">Image</label>
    <input type="file" id="image_path" name="image_path" class="w-full rounded-md border border-line px-3 py-2">
    @if($slider?->image_path)
        <p class="mt-2 text-sm text-muted">Current image: <img src="{{ asset($slider->image_path) }}" class="mt-1 h-20 w-auto rounded"></p>
    @endif
    @error('image_path') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<div>
    <label for="sort_order" class="mb-1 block text-sm font-semibold">Sort order</label>
    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $slider?->sort_order ?? 0) }}" class="w-full rounded-md border border-line px-3 py-2">
    @error('sort_order') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
</div>
<label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $slider?->is_active ?? true))>
    Visible on the website
</label>
