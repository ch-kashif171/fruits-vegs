<x-layouts.admin title="Edit produce">
    <form method="POST" action="{{ route('admin.produce-items.update', $item) }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @method('PUT')
        @include('admin.produce-items._form', ['item' => $item])
        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Save produce</button>
    </form>
</x-layouts.admin>
