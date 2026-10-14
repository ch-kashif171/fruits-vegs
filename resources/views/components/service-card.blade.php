@props(['service'])

@php
    $theme = match ($service->theme) {
        'export' => 'bg-linear-to-br from-teal to-forest',
        'wholesale' => 'bg-linear-to-br from-orange to-[#b4531a]',
        default => 'bg-linear-to-br from-leaf to-forest',
    };
@endphp

<a href="{{ route('services') }}" {{ $attributes->merge(['class' => 'group relative flex aspect-[1/1.05] min-h-[240px] flex-col justify-end overflow-hidden rounded-md p-7 text-white no-underline transition duration-200 hover:-translate-y-1.5 '.$theme]) }}>
    <span class="absolute top-5 right-6 text-5xl leading-none">{{ $service->icon }}</span>
    <h3 class="m-0 mb-1.5 font-serif text-[1.6rem]">{{ $service->title }}</h3>
    <span class="text-sm font-semibold opacity-90">Learn more</span>
</a>
