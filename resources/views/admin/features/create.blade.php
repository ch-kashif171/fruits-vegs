<x-layouts.admin title="Add feature">
    <form method="POST" action="{{ route('admin.features.store') }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @include('admin.features._form')
        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Create feature</button>
    </form>
</x-layouts.admin>
