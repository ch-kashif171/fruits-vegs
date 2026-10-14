<x-layouts.admin title="Edit service">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @method('PUT')
        @include('admin.services._form', ['service' => $service])
        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Save service</button>
    </form>
</x-layouts.admin>
