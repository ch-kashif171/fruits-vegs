@props(['item'])

@php
    $theme = match ($item->theme) {
        't2' => 'bg-linear-to-br from-[#f6a15b] to-[#d3603a]',
        't3' => 'bg-linear-to-br from-avocado to-[#4d6b1e]',
        't4' => 'bg-linear-to-br from-[#8a2b4a] to-[#4b1429]',
        't5' => 'bg-linear-to-br from-[#ff9f2e] to-[#e0630b]',
        't6' => 'bg-linear-to-br from-[#e5493a] to-[#a8221a]',
        default => 'bg-linear-to-br from-[#3b2f26] to-[#1b1410]',
    };
@endphp

<div {{ $attributes->merge(['class' => 'relative flex aspect-[3/2] items-end justify-between overflow-hidden rounded-md px-5 py-4 font-semibold text-white '.$theme]) }}>
    <span>{{ $item->name }}</span>
    <i class="absolute top-3.5 right-4 not-italic text-[3.6rem] leading-none">{{ $item->icon }}</i>
</div>
