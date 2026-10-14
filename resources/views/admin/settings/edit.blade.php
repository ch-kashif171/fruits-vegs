<x-layouts.admin title="Site settings">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="max-w-3xl space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-line">
        @csrf
        @method('PUT')

        @foreach ([
            'site_name' => 'Site name',
            'tagline' => 'Tagline',
            'address' => 'Address',
            'sales_label' => 'Sales phone label',
            'sales_phone' => 'Sales phone',
            'telephone_label' => 'Office phone label',
            'telephone' => 'Office phone',
            'email_info' => 'Info email',
            'email_hr' => 'HR email',
            'hours_weekdays' => 'Weekday hours',
            'hours_saturday' => 'Saturday hours',
            'hours_sunday' => 'Sunday hours',
            'map_embed_url' => 'Map embed URL',
            'cta_label' => 'Header button label',
            'copyright' => 'Footer copyright',
        ] as $key => $label)
            <div>
                <label for="{{ $key }}" class="mb-1 block text-sm font-semibold">{{ $label }}</label>
                @if (in_array($key, ['address', 'map_embed_url'], true))
                    <textarea id="{{ $key }}" name="{{ $key }}" rows="2" class="w-full rounded-md border border-line px-3 py-2">{{ old($key, $settings[$key] ?? '') }}</textarea>
                @else
                    <input id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $settings[$key] ?? '') }}" class="w-full rounded-md border border-line px-3 py-2">
                @endif
                @error($key) <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
            </div>
        @endforeach

        <div>
            <label for="logo" class="mb-1 block text-sm font-semibold">Logo</label>
            <input id="logo" name="logo" type="file" accept="image/*" class="w-full text-sm">
            @error('logo') <p class="mt-1 text-sm text-tomato">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="rounded-md bg-teal px-5 py-2.5 font-semibold text-white hover:bg-teal-dark">Save settings</button>
    </form>
</x-layouts.admin>
