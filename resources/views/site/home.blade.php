<x-layouts.site :page="$page">

    <!-- Hero Slider Section -->
    <section class="relative bg-forest-deep text-white main-slider">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @if(isset($sliders) && $sliders->isNotEmpty())
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <img src="{{ asset($slider->image_path) }}" alt="{{ strip_tags($slider->title) }}" @if($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                            <div class="wrap w-full z-10 grid lg:grid-cols-2 px-6 slider-mt">
                                <div>
                                    @if($slider->title)
                                        @if($loop->first)
                                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sans font-bold leading-tight mb-6">{!! nl2br(e($slider->title)) !!}</h1>
                                        @else
                                            <p class="text-4xl md:text-5xl lg:text-6xl font-sans font-bold leading-tight mb-6">{!! nl2br(e($slider->title)) !!}</p>
                                        @endif
                                    @endif
                                    @if($slider->subtitle)
                                        <p class="text-white/80 text-lg mb-8 max-w-lg">{{ $slider->subtitle }}</p>
                                    @endif
                                    @if($slider->button_text)
                                        <div class="flex flex-wrap items-center gap-4">
                                            <a href="{{ $slider->button_link ?? '#' }}" class="inline-flex rounded-sm bg-teal px-8 py-4 text-xs font-bold uppercase text-white hover:bg-forest-deep transition-colors">{{ $slider->button_text }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                    <!-- Fallback Slide 1 -->
                <div class="swiper-slide">
                    <img src="{{ asset('images/hero_produce.png') }}" alt="Fresh Produce">
                    <div class="wrap w-full z-10 grid lg:grid-cols-2 px-6 slider-mt">
                        <div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sans font-bold leading-tight mb-6">
                                Freshness You Can Trust, <br>Quality You Deserve
                            </h1>
                            <p class="text-white/80 text-lg mb-8 max-w-lg">
                                Your trusted source for premium-quality fruits and vegetables in the UAE and beyond. Import, export, and wholesale distribution.
                            </p>
                            <div class="flex flex-wrap items-center gap-4">
                                <a href="{{ route('services') }}" class="inline-flex rounded-sm bg-teal px-8 py-4 text-xs font-bold uppercase text-white hover:bg-forest-deep transition-colors">Our Services</a>
                                <a href="{{ route('contact') }}" class="inline-flex rounded-sm border-2 border-white bg-transparent px-8 py-3.5 text-xs font-bold uppercase text-white hover:bg-white hover:text-forest-deep transition-colors">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="{{ asset('images/export_produce.png') }}" alt="Export Produce">
                    <div class="wrap w-full z-10 grid lg:grid-cols-2 px-6 slider-mt">
                        <div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sans font-bold leading-tight mb-6">
                                Supplying Premium Produce <br>Worldwide
                            </h1>
                            <p class="text-white/80 text-lg mb-8 max-w-lg">
                                We specialize in exporting high-quality fruits and vegetables to international markets with strict quality standards.
                            </p>
                            <div class="flex flex-wrap items-center gap-4">
                                <a href="{{ route('about') }}" class="inline-flex rounded-sm bg-teal px-8 py-4 text-xs font-bold uppercase text-white hover:bg-forest-deep transition-colors">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="{{ asset('images/wholesale_produce.png') }}" alt="Wholesale Produce">
                    <div class="wrap w-full z-10 grid lg:grid-cols-2 px-6 slider-mt">
                        <div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sans font-bold leading-tight mb-6">
                                Reliable Supply <br>For Your Business
                            </h1>
                            <p class="text-white/80 text-lg mb-8 max-w-lg">
                                Competitive pricing and reliable logistics for supermarkets, hotels, and distributors across the region.
                            </p>
                            <div class="flex flex-wrap items-center gap-4">
                                <a href="{{ route('contact') }}" class="inline-flex rounded-sm bg-teal px-8 py-4 text-xs font-bold uppercase text-white hover:bg-forest-deep transition-colors">Get A Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-forest pt-12 pb-8 relative z-10">
        <div class="wrap grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-white/10 text-center">
            @if(isset($homeStats) && $homeStats->isNotEmpty())
                @foreach($homeStats as $stat)
                    <div class="flex flex-col items-center">
                        @if($stat->icon)
                            {!! $stat->icon !!}
                        @endif
                        <span class="text-white font-bold text-2xl">{{ $stat->title }}</span>
                        <span class="text-mist text-sm uppercase tracking-wide mt-1">{{ $stat->description }}</span>
                    </div>
                @endforeach
            @else
                <!-- Fallback Stats -->
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-8 h-8 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-white font-bold text-2xl">100%</span>
                    <span class="text-mist text-sm uppercase tracking-wide mt-1">Freshness Guaranteed</span>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-8 h-8 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-white font-bold text-2xl">Global</span>
                    <span class="text-mist text-sm uppercase tracking-wide mt-1">Import & Export</span>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-8 h-8 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" /></svg>
                    <span class="text-white font-bold text-2xl">B2B</span>
                    <span class="text-mist text-sm uppercase tracking-wide mt-1">Wholesale Supply</span>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-8 h-8 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                    <span class="text-white font-bold text-2xl">Top</span>
                    <span class="text-mist text-sm uppercase tracking-wide mt-1">Quality Standards</span>
                </div>
            @endif
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 bg-white">
        <div class="wrap">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="text-teal font-bold uppercase tracking-widest text-xs mb-3">Our Services</div>
                <h2 class="text-3xl md:text-4xl font-sans font-bold text-forest-deep mb-4">Premium Agricultural Supply <br>for Your Business</h2>
                <p class="text-muted">From routine local distribution to global export operations, our comprehensive services cover every aspect of fresh produce logistics.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($services) && $services->isNotEmpty())
                    @foreach($services->take(3) as $index => $service)
                        @php
                            $image = 'images/import_produce.png';
                            if($index == 1) { $image = 'images/export_produce.png'; }
                            if($index == 2) { $image = 'images/wholesale_produce.png'; }
                        @endphp
                        <div class="group border border-line rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="h-48 overflow-hidden bg-mist">
                                <img src="{{ asset($image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $service->name }}">
                            </div>
                            <div class="p-8">
                                <h3 class="font-sans font-bold text-xl text-forest-deep mb-3">{{ $service->name }}</h3>
                                <p class="text-muted mb-6 text-sm">{!! Str::limit(strip_tags($service->description ?? 'We provide top-quality services for our clients.'), 100) !!}</p>
                                <a href="{{ route('services') }}" class="text-sm font-bold text-forest-deep flex flex-row items-center gap-2 group-hover:text-teal transition-colors">
                                    Read more <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="col-span-full text-center text-muted">No services found.</p>
                @endif
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services') }}" class="inline-flex rounded-sm bg-forest-deep px-8 py-3.5 text-xs font-bold uppercase text-white hover:bg-teal transition-colors">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Global Export & Import -->
    <section class="py-24 bg-mist border-y border-line">
        <div class="wrap grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-teal font-bold uppercase tracking-widest text-xs mb-3">Global Export & Import</div>
                <h2 class="text-3xl md:text-4xl font-sans font-bold text-forest-deep mb-6">Strict Standard of Quality, <br>Delivering Freshness.</h2>
                <p class="text-muted mb-8">We specialize in importing the finest produce from around the world and exporting fresh, hand-picked fruits and vegetables to international markets. With a commitment to freshness, quality, and sustainability, we ensure that every product we deliver meets the highest standards.</p>
                <a href="{{ route('about') }}" class="inline-flex flex-row items-center gap-2 text-sm font-bold text-teal hover:text-forest-deep transition-colors">
                    Learn more about us <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
            </div>

            <div class="grid gap-6">
                @if(isset($homeExports) && $homeExports->isNotEmpty())
                    @foreach($homeExports as $export)
                        <div class="flex gap-4 p-6 bg-white rounded-lg shadow-sm border border-line">
                            <div class="mt-1">{!! $export->icon ?? '<svg class="text-teal w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>' !!}</div>
                            <div>
                                <h4 class="font-bold text-forest-deep mb-1">{{ $export->title }}</h4>
                                <p class="text-sm text-muted">{{ $export->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex gap-4 p-6 bg-white rounded-lg shadow-sm border border-line">
                        <div class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        <div>
                            <h4 class="font-bold text-forest-deep mb-1">Global Sourcing</h4>
                            <p class="text-sm text-muted">We partner with top agricultural hubs worldwide for the best yields.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 p-6 bg-white rounded-lg shadow-sm border border-line">
                        <div class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        <div>
                            <h4 class="font-bold text-forest-deep mb-1">Cold-Chain Logistics</h4>
                            <p class="text-sm text-muted">Temperature-controlled shipping ensures maximum freshness on arrival.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 p-6 bg-white rounded-lg shadow-sm border border-line">
                        <div class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="text-teal w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        <div>
                            <h4 class="font-bold text-forest-deep mb-1">Wholesale Pricing</h4>
                            <p class="text-sm text-muted">Competitive B2B rates for supermarkets, hotels, and distributors.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Produce Showcase -->
    <section class="py-24 bg-white">
        <div class="wrap">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-sans font-bold text-forest-deep mb-4">Our Premium Produce.</h2>
                <p class="text-muted">A glimpse into the vast variety of fresh fruits and vegetables we supply year-round.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @if(-isset($produceItems) && $produceItems->isNotEmpty())
                    @foreach($produceItems as $item)
                        <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm">
                            <div class="text-4xl mb-3"><img class="sm-icon" src="{{ $item->image_path ?? '' }}"></div>
                            <h4 class="font-bold text-forest-deep text-sm">{{ $item->name }}</h4>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback if database is empty -->
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🧄</div><h4 class="font-bold text-forest-deep text-sm">Garlic</h4></div>
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🍎</div><h4 class="font-bold text-forest-deep text-sm">Apples</h4></div>
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🥭</div><h4 class="font-bold text-forest-deep text-sm">Mangoes</h4></div>
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🧅</div><h4 class="font-bold text-forest-deep text-sm">Onion</h4></div>
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🍊</div><h4 class="font-bold text-forest-deep text-sm">Oranges</h4></div>
                    <div class="bg-mist border border-line rounded-lg p-6 text-center hover:border-teal transition-colors shadow-sm"><div class="text-4xl mb-3">🍅</div><h4 class="font-bold text-forest-deep text-sm">Tomatoes & Peppers</h4></div>
                @endif
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-24 bg-forest-deep text-white">
        <div class="wrap grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="text-teal font-bold uppercase tracking-widest text-xs mb-3">Get In Touch</div>
                <h2 class="text-3xl md:text-4xl font-sans font-bold mb-6">Partner With Us For <br>Fresh Produce Supply</h2>
                <p class="text-white/80 mb-8 max-w-md">We'd love to hear from you. Whether you're looking for a fresh produce supply or want to partner with us, reach out today.</p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-white/60">Sales Manager</div>
                            <div class="font-bold text-sm"><a href="tel:{{ setting('sales_phone') ?? '+971 54 522 5476' }}">{{ setting('sales_phone') ?? '+971 54 522 5476' }}</a></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-white/60">Email Info</div>
                            <div class="font-bold text-xs"><a href="mailto:{{ setting('email_info') ?? 'alzahravegfruits786@email.com' }}">{{ setting('email_info') ?? 'alzahravegfruits786@email.com' }}</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-2xl text-ink" id="contact-us">
                <h3 class="font-sans font-bold text-2xl text-forest-deep mb-6">Send us a message</h3>

                @if(session('success'))
                    <div class="mb-6 rounded-md bg-leaf/20 p-4 border border-leaf">
                        <div class="flex">
                            <div class="flex-shrink-0"><i class="fa-solid fa-circle-check text-leaf"></i></div>
                            <div class="ml-3"><p class="text-sm font-medium text-forest-deep">{{ session('success') }}</p></div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <span class="alter-danger">{{session('error')}}</span>
                @endif

                @if($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 p-4 border border-tomato/30 text-xs text-tomato">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="grid gap-4">
                    @csrf
                    <div>
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Your Name" required class="w-full rounded-sm border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none">
                        @error('name')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <input name="phone" type="tel" value="{{ old('phone') }}" placeholder="Phone Number" required class="w-full rounded-sm border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none">
                            @error('phone')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <input name="email" type="email" value="{{ old('email') }}" placeholder="Email Address" required class="w-full rounded-sm border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none">
                            @error('email')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div>
                        <select name="subject" class="w-full rounded-sm border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none text-muted">
                            <option value="">Inquiry Type</option>
                            <option value="wholesale" @selected(old('subject') === 'wholesale')>Wholesale Order</option>
                            <option value="import" @selected(old('subject') === 'import')>Import Inquiry</option>
                            <option value="export" @selected(old('subject') === 'export')>Export Inquiry</option>
                            <option value="other" @selected(old('subject') === 'other')>Other</option>
                        </select>
                        @error('subject')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <textarea name="message" placeholder="Message details..." required class="h-24 w-full resize-none rounded-sm border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none">{{ old('message') }}</textarea>
                        @error('message')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                    </div>

                    <x-captcha variant="compact" />

                    <button type="submit" class="w-full rounded-sm bg-teal px-6 py-4 text-xs font-bold uppercase text-white hover:bg-forest-deep transition-colors mt-2">Send message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Swiper JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.hero-swiper', {
                loop: true,
                speed: 800,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
</x-layouts.site>
