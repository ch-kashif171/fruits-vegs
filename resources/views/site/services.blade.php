<x-layouts.site :page="$page">

    <!-- Page Hero -->
    <section class="pt-32 pb-16 lg:pt-40 lg:pb-24 bg-forest-deep text-white relative overflow-hidden banner-ht">
        <div class="absolute inset-0 opacity-10 pointer-events-none page-hero-glow"></div>
        <div class="wrap relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-sans font-bold mb-4">{{ $page->title ?? 'Services' }}</h1>
            <p class="text-mist max-w-2xl mx-auto">{{ $page->hero_subtitle ?? $page->excerpt ?? $page->meta_description ?? 'From the farm to your shelf, handled end to end. We specialize in importing, exporting and distributing premium fresh produce globally.' }}</p>
        </div>

        <div class="pv-hero-wave">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="white"/>
            </svg>
        </div>
    </section>

    <div class="services-page">
        <!-- 2. SERVICES GRID -->
        <section class="srv-grid-sec">
            <div class="srv-container">
                <div class="srv-grid-header">
                    <h2>Four ways we supply fresh produce</h2>
                    <p>Whether you need global shipping or local delivery, we have you covered.</p>
                </div>
                <div class="srv-cards">
                    @if($services->isNotEmpty())
                        @foreach($services as $service)
                            <a href="{{ route('contact') }}" class="srv-card srv-{{ $service->theme }}">
                                @if($service->icon)
                                    <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}" loading="lazy">
                                @endif
                                <div class="srv-card-content">
                                    <h3>{{ $service->title }}</h3>
                                    <p>{{ $service->excerpt }}</p>
                                    <span>{{ $service->body ?: 'Get in touch' }}</span>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a href="{{ route('contact') }}" class="srv-card srv-export">
                            <img src="{{ asset('images/export_produce.png') }}" alt="Export standards" loading="lazy">
                            <div class="srv-card-content">
                                <h3>Export</h3>
                                <p>Hand-picked produce packed to export standards and shipped to wholesalers, supermarkets and food industries worldwide.</p>
                                <span>Request export prices</span>
                            </div>
                        </a>
                        <a href="{{ route('contact') }}" class="srv-card srv-import">
                            <img src="{{ asset('images/import_produce.png') }}" alt="Imported premium fruits" loading="lazy">
                            <div class="srv-card-content">
                                <h3>Import</h3>
                                <p>Premium produce sourced from trusted farms and leading agricultural hubs around the world.</p>
                                <span>Ask about sourcing</span>
                            </div>
                        </a>
                        <a href="{{ route('contact') }}" class="srv-card srv-wholesale">
                            <img src="{{ asset('images/wholesale_produce.png') }}" alt="Wholesale bulk supply" loading="lazy">
                            <div class="srv-card-content">
                                <h3>Wholesale</h3>
                                <p>Bulk supply for supermarkets, grocery stores, hotels and restaurants, delivered on time.</p>
                                <span>Get wholesale pricing</span>
                            </div>
                        </a>
                        <a href="{{ route('contact') }}" class="srv-card srv-retail">
                            <img src="{{ asset('images/hero_produce.png') }}" alt="Local retail and grocery supply" loading="lazy">
                            <div class="srv-card-content">
                                <h3>Local retail supply</h3>
                                <p>Daily deliveries to grocery stores, markets and specialty shops across the UAE.</p>
                                <span>Set up deliveries</span>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </section>

        <!-- 3. HOW AN ORDER WORKS -->
        <section class="srv-process">
            <div class="srv-container">
                <h2>How an order works</h2>
                <ol class="srv-steps">
                    <li class="srv-step">
                        <div class="srv-step-num">1</div>
                        <h3>Tell us what you need</h3>
                        <p>Send the products, quantities and destination.</p>
                    </li>
                    <li class="srv-step">
                        <div class="srv-step-num">2</div>
                        <h3>Get a quote</h3>
                        <p>We confirm availability and pricing for your order.</p>
                    </li>
                    <li class="srv-step">
                        <div class="srv-step-num">3</div>
                        <h3>We pack and ship</h3>
                        <p>Produce is graded, packed and moved with temperature control.</p>
                    </li>
                    <li class="srv-step">
                        <div class="srv-step-num">4</div>
                        <h3>You receive it fresh</h3>
                        <p>Delivery to your warehouse, store or port.</p>
                    </li>
                </ol>
            </div>
        </section>

        <!-- 4. FAQ -->
        <section class="srv-faq">
            <div class="srv-container srv-faq-grid">
                <div class="srv-faq-left">
                    <h2>Frequently asked questions</h2>
                    <p>Can't find your answer? Call or email our sales team.</p>
                </div>
                <div class="srv-faq-right">
                    <details class="srv-details" name="faq">
                        <summary>Where do we source from? <span class="srv-icon">+</span></summary>
                        <div class="srv-details-content">
                            We source from trusted agricultural hubs across the globe to ensure the highest quality and year-round availability.
                        </div>
                    </details>
                    <details class="srv-details" name="faq">
                        <summary>Do you offer wholesale pricing? <span class="srv-icon">+</span></summary>
                        <div class="srv-details-content">
                            Yes, we offer competitive wholesale pricing for supermarkets, hotels, restaurants, and other B2B clients.
                        </div>
                    </details>
                    <details class="srv-details" name="faq">
                        <summary>Can I make custom orders? <span class="srv-icon">+</span></summary>
                        <div class="srv-details-content">
                            Absolutely. We can accommodate custom volumes and specific produce requirements based on seasonal availability.
                        </div>
                    </details>
                    <details class="srv-details" name="faq">
                        <summary>How do we keep produce fresh? <span class="srv-icon">+</span></summary>
                        <div class="srv-details-content">
                            We use advanced temperature-controlled logistics and strict grading procedures from farm to final delivery.
                        </div>
                    </details>
                    <details class="srv-details" name="faq">
                        <summary>How to contact us for bulk orders? <span class="srv-icon">+</span></summary>
                        <div class="srv-details-content">
                            You can call us directly at <a href="tel:+971502528036">+971 50 252 8036</a> or email us at <a href="mailto:info@zahratalmadinafruitsandveg.com">info@zahratalmadinafruitsandveg.com</a> to discuss your requirements.
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- 5. CTA BAND -->
        <aside class="srv-cta">
            <div class="srv-container srv-cta-flex">
                <div>
                    <h2>Ready to place an order?</h2>
                    <p>Tell us what you need and we'll reply with a quote.</p>
                </div>
                <div class="srv-cta-buttons">
                    <a href="{{ route('contact') }}" class="srv-btn srv-btn-solid">Get a quote</a>
                    <a href="tel:+971502528036" class="srv-btn srv-btn-outline">Call sales</a>
                </div>
            </div>
        </aside>
    </div>

</x-layouts.site>
