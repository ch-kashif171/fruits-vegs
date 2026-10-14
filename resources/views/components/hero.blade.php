@props([
    'page',
    'home' => false,
])

@php
    $heroImage = $page->hero_image
        ? (str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset($page->hero_image))
        : null;
@endphp

<section @class([
    'site-hero relative overflow-hidden text-center text-white',
    'grid min-h-[92vh] place-items-center px-0 pt-36 pb-24' => $home,
    'grid min-h-[360px] place-items-center px-0 pt-36 pb-16' => ! $home,
])
@if ($heroImage) style="--hero-image: url('{{ e($heroImage) }}')" @endif>
    <span @class([
        'pointer-events-none absolute rounded-full bg-[radial-gradient(circle_at_35%_30%,#ffb45c,#f28c28)] opacity-90',
        'size-[380px] -bottom-36 -left-28' => $home,
        'size-[240px] -bottom-28 -left-20' => ! $home,
    ])></span>
    <span @class([
        'pointer-events-none absolute rounded-full bg-[radial-gradient(circle_at_35%_30%,#ff7a62,#d8432f)] opacity-90',
        'size-[260px] top-[12%] -right-16' => $home,
        'size-40 top-[20%] -right-10' => ! $home,
    ])></span>
    @if ($home)
        <span class="pointer-events-none absolute right-[14%] -bottom-12 size-[150px] rounded-full bg-[radial-gradient(circle_at_35%_30%,#c4dc6a,#8aa63a)] opacity-90"></span>
        <span class="pointer-events-none absolute left-[12%] top-[20%] size-[90px] rounded-full bg-[radial-gradient(circle_at_35%_30%,#ffd2b0,#f6b58a)] opacity-90"></span>
    @endif

    <div class="wrap relative z-2">
        <h1 @class(['mx-auto max-w-[15ch] text-balance font-serif', 'text-[clamp(2.4rem,6vw,4.6rem)]' => $home, 'text-[clamp(2.2rem,5vw,3.6rem)]' => ! $home])>
            {{ $page->hero_title }}
        </h1>
        @if ($page->hero_subtitle)
            <p class="mx-auto mt-4 mb-8 max-w-[56ch] text-lg text-white/90">{{ $page->hero_subtitle }}</p>
        @endif
        {{ $slot }}
    </div>
</section>
