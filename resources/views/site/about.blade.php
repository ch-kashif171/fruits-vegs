<x-layouts.site :page="$page">

    <!-- Page Hero -->
    <section class="pt-32 pb-16 lg:pt-40 lg:pb-24 bg-forest-deep text-white relative overflow-hidden banner-ht">
        <div class="absolute inset-0 opacity-10 pointer-events-none page-hero-glow"></div>
        <div class="wrap relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-sans font-bold mb-4">{{ $page->title ?? 'About Us' }}</h1>
            <p class="text-mist max-w-2xl mx-auto">{{ $page->excerpt ?? 'Seasonal and exotic fruits and vegetables for businesses, supermarkets, restaurants and wholesalers. Our mission, vision and values.' }}</p>
        </div>
        <div class="pv-hero-wave">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-white">
        <div class="wrap grid lg:grid-cols-2 gap-16 items-start">
            <div>
                <div class="text-teal font-bold uppercase tracking-widest text-xs mb-3">About Us</div>
                <h2 class="text-3xl md:text-4xl font-sans font-bold text-forest-deep mb-6">Premium Produce for the <br>Global Market.</h2>
                <div class="prose max-w-none text-muted mb-8">
                    {!! $page->extra['lead'] ?? '<p class="text-lg">We take pride in offering a diverse selection of seasonal and exotic fruits and vegetables, catering to businesses, supermarkets, restaurants, and wholesalers. Our commitment to excellence and sustainability drives us to deliver fresh, nutritious, and pesticide-free produce at competitive prices.</p>' !!}
                </div>
            </div>

            <div class="bg-mist p-8 rounded-xl border border-line shadow-sm lg:col-span-1">
                <h3 class="font-sans font-bold text-2xl text-forest-deep mb-6">Why Choose Us?</h3>
                <div class="grid gap-4">
                    <div class="flex gap-4 items-center bg-white p-4 rounded border border-line">
                        <i class="fa-solid fa-circle-check text-teal text-xl"></i>
                        <span class="font-bold text-forest-deep">High-quality produce</span>
                    </div>
                    <div class="flex gap-4 items-center bg-white p-4 rounded border border-line">
                        <i class="fa-solid fa-circle-check text-teal text-xl"></i>
                        <span class="font-bold text-forest-deep">Reliable global supply chain</span>
                    </div>
                    <div class="flex gap-4 items-center bg-white p-4 rounded border border-line">
                        <i class="fa-solid fa-circle-check text-teal text-xl"></i>
                        <span class="font-bold text-forest-deep">Freshness guaranteed</span>
                    </div>
                    <div class="flex gap-4 items-center bg-white p-4 rounded border border-line">
                        <i class="fa-solid fa-circle-check text-teal text-xl"></i>
                        <span class="font-bold text-forest-deep">Competitive pricing</span>
                    </div>
                    <div class="flex gap-4 items-center bg-white p-4 rounded border border-line">
                        <i class="fa-solid fa-circle-check text-teal text-xl"></i>
                        <span class="font-bold text-forest-deep">Customer satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="py-24 bg-mist border-t border-line">
        <div class="wrap">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-line hover:border-teal transition-colors">
                    <div class="size-16 mx-auto bg-forest-deep text-white rounded-full inline-flex items-center justify-center text-2xl mb-6 shadow-md">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-white mx-auto">
                            {!! $mission->icon ?? '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" /></svg>' !!}
                        </div>
                    </div>
                    <h3 class="font-sans font-bold text-xl text-forest-deep mb-4">{{ $mission->title ?? 'Mission' }}</h3>
                    <p class="text-muted text-sm">{{ $mission->description ?? 'We are committed to delivering the freshest, highest-quality fruits and vegetables while ensuring sustainability, customer satisfaction, and global accessibility.' }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-line hover:border-teal transition-colors">
                    <div class="size-16 mx-auto bg-forest-deep text-white rounded-full inline-flex items-center justify-center text-2xl mb-6 shadow-md">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-white mx-auto">
                            {!! $vision->icon ?? '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>' !!}
                        </div>
                    </div>
                    <h3 class="font-sans font-bold text-xl text-forest-deep mb-4">{{ $vision->title ?? 'Vision' }}</h3>
                    <p class="text-muted text-sm">{{ $vision->description ?? 'To be a leading supplier of fresh produce, recognized for quality, reliability, and eco-friendly practices.' }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-line hover:border-teal transition-colors">
                    <div class="size-16 mx-auto bg-forest-deep text-white rounded-full inline-flex items-center justify-center text-2xl mb-6 shadow-md">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-white mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152z" /></svg>
                        </div>
                    </div>
                    <h3 class="font-sans font-bold text-xl text-forest-deep mb-4">Values</h3>
                    <ul class="text-muted text-sm space-y-2 text-left w-max mx-auto">
                        @if(isset($values) && $values->isNotEmpty())
                            @foreach($values as $value)
                                <li><i class="fa-solid fa-check text-teal mr-2"></i> {{ $value->title }}</li>
                            @endforeach
                        @else
                            <li><i class="fa-solid fa-check text-teal mr-2"></i> Quality First</li>
                            <li><i class="fa-solid fa-check text-teal mr-2"></i> Customer Commitment</li>
                            <li><i class="fa-solid fa-check text-teal mr-2"></i> Sustainability</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-layouts.site>
