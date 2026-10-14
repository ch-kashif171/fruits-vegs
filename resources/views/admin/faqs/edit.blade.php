<x-layouts.admin title="Edit FAQ">
    <div class="mb-4">
        <a href="{{ route('admin.faqs.index') }}" class="text-sm font-semibold text-teal hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Back to FAQs</a>
    </div>
    <div class="max-w-2xl overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
        <form method="POST" action="{{ route('admin.faqs.update', $faq) }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label for="question" class="mb-1.5 block text-sm font-medium text-ink">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="w-full rounded-md border-line px-3 py-2 text-sm shadow-sm outline-none focus:border-teal focus:ring focus:ring-teal/20 transition-all" required>
                @error('question')
                    <p class="mt-1.5 text-sm text-red-500"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="answer" class="mb-1.5 block text-sm font-medium text-ink">Answer</label>
                <textarea name="answer" id="answer" rows="5" class="w-full rounded-md border-line px-3 py-2 text-sm shadow-sm outline-none focus:border-teal focus:ring focus:ring-teal/20 transition-all" required>{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                    <p class="mt-1.5 text-sm text-red-500"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label for="sort_order" class="mb-1.5 block text-sm font-medium text-ink">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $faq->sort_order) }}" min="0" class="w-32 rounded-md border-line px-3 py-2 text-sm shadow-sm outline-none focus:border-teal focus:ring focus:ring-teal/20 transition-all" required>
                @error('sort_order')
                    <p class="mt-1.5 text-sm text-red-500"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 border-t border-line pt-5 mt-2">
                <button type="submit" class="rounded-md bg-forest px-6 py-2 text-sm font-semibold text-white hover:bg-forest/90 shadow-sm transition-colors"><i class="fa-solid fa-check mr-2"></i> Update FAQ</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
