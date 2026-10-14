<x-layouts.admin title="Add produce">
    <form method="POST" action="{{ route('admin.produce-items.store') }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @include('admin.produce-items._form', ['defaultCategory' => request('category', 'other')])
        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Create produce</button>
    </form>
</x-layouts.admin>
