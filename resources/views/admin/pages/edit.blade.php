<x-layouts.admin :title="'Edit '.$page->slug.' page'">
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="mb-1 block text-sm font-semibold">Browser title</label>
            <input id="title" name="title" value="{{ old('title', $page->title) }}" class="w-full rounded-md border border-line px-3 py-2">
            @error('title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="meta_description" class="mb-1 block text-sm font-semibold">Meta description</label>
            <textarea id="meta_description" name="meta_description" rows="2" class="w-full rounded-md border border-line px-3 py-2">{{ old('meta_description', $page->meta_description) }}</textarea>
            @error('meta_description') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="hero_title" class="mb-1 block text-sm font-semibold">Hero title</label>
            <input id="hero_title" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}" class="w-full rounded-md border border-line px-3 py-2">
            @error('hero_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="hero_subtitle" class="mb-1 block text-sm font-semibold">Hero subtitle</label>
            <textarea id="hero_subtitle" name="hero_subtitle" rows="3" class="w-full rounded-md border border-line px-3 py-2">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
            @error('hero_subtitle') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="hero_image" class="mb-1 block text-sm font-semibold">Hero image</label>
            <input id="hero_image" name="hero_image" type="file" accept="image/*" class="w-full text-sm">
            @error('hero_image') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>

        @if ($page->slug === 'home')
            <div>
                <label for="intro_title" class="mb-1 block text-sm font-semibold">Intro title</label>
                <input id="intro_title" name="intro_title" value="{{ old('intro_title', $page->extraValue('intro_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('intro_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="intro_body" class="mb-1 block text-sm font-semibold">Intro body</label>
                <textarea id="intro_body" name="intro_body" rows="5" class="w-full rounded-md border border-line px-3 py-2">{{ old('intro_body', $page->extraValue('intro_body')) }}</textarea>
                @error('intro_body') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="cta_title" class="mb-1 block text-sm font-semibold">Call-to-action title</label>
                <input id="cta_title" name="cta_title" value="{{ old('cta_title', $page->extraValue('cta_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('cta_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="cta_body" class="mb-1 block text-sm font-semibold">Call-to-action body</label>
                <textarea id="cta_body" name="cta_body" rows="3" class="w-full rounded-md border border-line px-3 py-2">{{ old('cta_body', $page->extraValue('cta_body')) }}</textarea>
                @error('cta_body') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="cta_button" class="mb-1 block text-sm font-semibold">Call-to-action button</label>
                <input id="cta_button" name="cta_button" value="{{ old('cta_button', $page->extraValue('cta_button')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('cta_button') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
        @endif

        @if ($page->slug === 'about')
            <div>
                <label for="section_title" class="mb-1 block text-sm font-semibold">Section title</label>
                <input id="section_title" name="section_title" value="{{ old('section_title', $page->extraValue('section_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('section_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="lead" class="mb-1 block text-sm font-semibold">Lead text</label>
                <textarea id="lead" name="lead" rows="5" class="w-full rounded-md border border-line px-3 py-2">{{ old('lead', $page->extraValue('lead')) }}</textarea>
                @error('lead') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="why_title" class="mb-1 block text-sm font-semibold">Why choose us title</label>
                <input id="why_title" name="why_title" value="{{ old('why_title', $page->extraValue('why_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('why_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="why_choose" class="mb-1 block text-sm font-semibold">Why choose us (one per line)</label>
                <textarea id="why_choose" name="why_choose" rows="6" class="w-full rounded-md border border-line px-3 py-2">{{ old('why_choose', implode("\n", $page->extraValue('why_choose', []))) }}</textarea>
                @error('why_choose') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="mission" class="mb-1 block text-sm font-semibold">Mission</label>
                <textarea id="mission" name="mission" rows="3" class="w-full rounded-md border border-line px-3 py-2">{{ old('mission', $page->extraValue('mission')) }}</textarea>
                @error('mission') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="vision" class="mb-1 block text-sm font-semibold">Vision</label>
                <textarea id="vision" name="vision" rows="3" class="w-full rounded-md border border-line px-3 py-2">{{ old('vision', $page->extraValue('vision')) }}</textarea>
                @error('vision') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="values" class="mb-1 block text-sm font-semibold">Values (one per line)</label>
                <textarea id="values" name="values" rows="4" class="w-full rounded-md border border-line px-3 py-2">{{ old('values', implode("\n", $page->extraValue('values', []))) }}</textarea>
                @error('values') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
        @endif

        @if ($page->slug === 'services')
            <div>
                <label for="faq_title" class="mb-1 block text-sm font-semibold">FAQ heading</label>
                <input id="faq_title" name="faq_title" value="{{ old('faq_title', $page->extraValue('faq_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('faq_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
        @endif

        @if ($page->slug === 'contact')
            <div>
                <label for="intro_title" class="mb-1 block text-sm font-semibold">Contact intro title</label>
                <input id="intro_title" name="intro_title" value="{{ old('intro_title', $page->extraValue('intro_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('intro_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="form_title" class="mb-1 block text-sm font-semibold">Form title</label>
                <input id="form_title" name="form_title" value="{{ old('form_title', $page->extraValue('form_title')) }}" class="w-full rounded-md border border-line px-3 py-2">
                @error('form_title') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
        @endif

        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Save page</button>
    </form>
</x-layouts.admin>
