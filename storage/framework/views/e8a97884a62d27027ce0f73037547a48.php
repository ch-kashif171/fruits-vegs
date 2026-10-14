<?php if (isset($component)) { $__componentOriginalfefb4fd9b7004fa65f70c415ac76903e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfefb4fd9b7004fa65f70c415ac76903e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.site','data' => ['page' => $page]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.site'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page)]); ?>

    
    <section class="pv-hero">
        <div class="pv-hero-glow"></div>
        <div class="wrap relative z-10 text-center">
            <div class="pv-hero-badge">🌿 Premium Fresh Produce</div>
            <h1 class="text-4xl md:text-5xl font-sans font-bold mb-4"><?php echo e($page->title ?? 'Fruits &amp; Vegetables'); ?></h1>
            <p class="pv-hero-sub"><?php echo e($page->hero_subtitle ?? 'Fresh, seasonal and premium-quality produce sourced from trusted farms around the world.'); ?></p>
            
        </div>
        <div class="pv-hero-wave">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="white"/>
            </svg>
        </div>
    </section>

    
    <section class="pv-intro-strip">
        <div class="wrap pv-strip-grid">
            <div class="pv-strip-item">
                <span class="pv-strip-icon">🌍</span>
                <span>Global Sourcing</span>
            </div>
            <div class="pv-strip-item">
                <span class="pv-strip-icon">❄️</span>
                <span>Cold-Chain Delivery</span>
            </div>
            <div class="pv-strip-item">
                <span class="pv-strip-icon">✅</span>
                <span>Freshness Guaranteed</span>
            </div>
            <div class="pv-strip-item">
                <span class="pv-strip-icon">🏷️</span>
                <span>Wholesale Pricing</span>
            </div>
        </div>
    </section>

    
    <section class="pv-section" id="fruits">
        <div class="wrap">
            <div class="pv-section-head">
                <div class="pv-section-label pv-label-fruit">🍎 Fresh Fruits</div>
                <h2 class="pv-section-title">Our Seasonal Fruits</h2>
                <p class="pv-section-desc">Hand-selected from the world's finest orchards. Sweet, fresh and delivered to your door.</p>
            </div>

            <div class="pv-grid">
                <?php if($fruits->isNotEmpty()): ?>
                    <?php $__currentLoopData = $fruits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pv-card pv-card-fruit">
                            <?php if(!empty($fruit->image_path)): ?>
                                <img class="fruit-veg" src="<?php echo e($fruit->image_path); ?>">
                            <?php else: ?>
                                <div class="pv-card-emoji"><?php echo e($fruit->icon ?? '🍎'); ?></div>
                            <?php endif; ?>

                            <div class="pv-card-body">
                                <h3 class="pv-card-name"><?php echo e($fruit->name); ?></h3>
                                <p class="pv-card-tag">Fresh Fruit</p>
                            </div>
                            <div class="pv-card-overlay">
                                <a href="<?php echo e(route('contact')); ?>" class="pv-card-cta">Enquire Now</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    
                    <?php $__currentLoopData = [
                        ['icon' => '🍎', 'name' => 'Apples'],
                        ['icon' => '🍊', 'name' => 'Oranges'],
                        ['icon' => '🍌', 'name' => 'Bananas'],
                        ['icon' => '🥭', 'name' => 'Mangoes'],
                        ['icon' => '🍇', 'name' => 'Grapes'],
                        ['icon' => '🍓', 'name' => 'Strawberries'],
                        ['icon' => '🍉', 'name' => 'Watermelons'],
                        ['icon' => '🥑', 'name' => 'Avocados'],
                        ['icon' => '🍋', 'name' => 'Lemons'],
                        ['icon' => '🍑', 'name' => 'Peaches'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pv-card pv-card-fruit">
                            <div class="pv-card-emoji"><?php echo e($item['icon']); ?></div>
                            <div class="pv-card-body">
                                <h3 class="pv-card-name"><?php echo e($item['name']); ?></h3>
                                <p class="pv-card-tag">Fresh Fruit</p>
                            </div>
                            <div class="pv-card-overlay">
                                <a href="<?php echo e(route('contact')); ?>" class="pv-card-cta">Enquire Now</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <div class="pv-banner">
        <div class="wrap pv-banner-inner">
            <p>Looking for bulk orders or custom sourcing?</p>
            <a href="<?php echo e(route('contact')); ?>" class="pv-banner-btn">Talk to Our Team →</a>
        </div>
    </div>

    
    <section class="pv-section pv-section-alt" id="vegetables">
        <div class="wrap">
            <div class="pv-section-head">
                <div class="pv-section-label pv-label-veg">🥦 Fresh Vegetables</div>
                <h2 class="pv-section-title">Our Premium Vegetables</h2>
                <p class="pv-section-desc">Farm-fresh vegetables harvested at peak quality. Available year-round for wholesale and export.</p>
            </div>

            <div class="pv-grid">
                <?php if($vegetables->isNotEmpty()): ?>
                    <?php $__currentLoopData = $vegetables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vegetable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pv-card pv-card-veg">
                            <?php if(!empty($vegetable->image_path)): ?>
                                <img class="fruit-veg" src="<?php echo e($vegetable->image_path); ?>">
                            <?php else: ?>
                                <div class="pv-card-emoji"><?php echo e($vegetable->icon ?? '🥦'); ?></div>
                            <?php endif; ?>
                            <div class="pv-card-body">
                                <h3 class="pv-card-name"><?php echo e($vegetable->name); ?></h3>
                                <p class="pv-card-tag">Fresh Vegetable</p>
                            </div>
                            <div class="pv-card-overlay">
                                <a href="<?php echo e(route('contact')); ?>" class="pv-card-cta">Enquire Now</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    
                    <?php $__currentLoopData = [
                        ['icon' => '🍅', 'name' => 'Tomatoes'],
                        ['icon' => '🥒', 'name' => 'Cucumber'],
                        ['icon' => '🥕', 'name' => 'Carrots'],
                        ['icon' => '🫑', 'name' => 'Bell Peppers'],
                        ['icon' => '🧄', 'name' => 'Garlic'],
                        ['icon' => '🧅', 'name' => 'Onions'],
                        ['icon' => '🥦', 'name' => 'Broccoli'],
                        ['icon' => '🥬', 'name' => 'Lettuce'],
                        ['icon' => '🥔', 'name' => 'Potatoes'],
                        ['icon' => '🌽', 'name' => 'Corn'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pv-card pv-card-veg">
                            <div class="pv-card-emoji"><?php echo e($item['icon']); ?></div>
                            <div class="pv-card-body">
                                <h3 class="pv-card-name"><?php echo e($item['name']); ?></h3>
                                <p class="pv-card-tag">Fresh Vegetable</p>
                            </div>
                            <div class="pv-card-overlay">
                                <a href="<?php echo e(route('contact')); ?>" class="pv-card-cta">Enquire Now</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="pv-why">
        <div class="wrap">
            <div class="pv-section-head">
                <h2 class="pv-section-title" style="color:#fff;">Why Source From Us?</h2>
                <p class="pv-section-desc" style="color:rgba(255,255,255,.75);">We are more than just a supplier. We are your partner in freshness.</p>
            </div>
            <div class="pv-why-grid">
                <div class="pv-why-card">
                    <div class="pv-why-icon">🌱</div>
                    <h3>Farm to Shelf</h3>
                    <p>Directly sourced from trusted farms worldwide, cutting out unnecessary middlemen.</p>
                </div>
                <div class="pv-why-card">
                    <div class="pv-why-icon">🚚</div>
                    <h3>Reliable Delivery</h3>
                    <p>Temperature-controlled logistics ensuring your produce arrives fresh every time.</p>
                </div>
                <div class="pv-why-card">
                    <div class="pv-why-icon">🏷️</div>
                    <h3>Competitive Pricing</h3>
                    <p>Bulk wholesale rates tailored for supermarkets, hotels, restaurants, and distributors.</p>
                </div>
                <div class="pv-why-card">
                    <div class="pv-why-icon">🌍</div>
                    <h3>Global Network</h3>
                    <p>Import and export services connecting you to top agricultural hubs across the globe.</p>
                </div>
            </div>
        </div>
    </section>

    
    <section class="pv-cta">
        <div class="wrap pv-cta-inner">
            <div>
                <h2>Ready to order fresh produce?</h2>
                <p>Contact our sales team and get a quote within 24 hours.</p>
            </div>
            <div class="pv-cta-actions">
                <a href="<?php echo e(route('contact')); ?>" class="pv-btn-solid">Get a Quote</a>
                <a href="tel:+971502528036" class="pv-btn-outline">📞 Call Sales</a>
            </div>
        </div>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfefb4fd9b7004fa65f70c415ac76903e)): ?>
<?php $attributes = $__attributesOriginalfefb4fd9b7004fa65f70c415ac76903e; ?>
<?php unset($__attributesOriginalfefb4fd9b7004fa65f70c415ac76903e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfefb4fd9b7004fa65f70c415ac76903e)): ?>
<?php $component = $__componentOriginalfefb4fd9b7004fa65f70c415ac76903e; ?>
<?php unset($__componentOriginalfefb4fd9b7004fa65f70c415ac76903e); ?>
<?php endif; ?>

<script>
    document.querySelectorAll('.pv-card.pv-card-fruit').forEach(card => {
        const tag = card.querySelector('.pv-card-tag');

        if (!tag) return;

        card.addEventListener('mouseenter', () => {
            tag.style.opacity = '0';
        });

        card.addEventListener('mouseleave', () => {
            tag.style.opacity = '1';
        });
    });
</script>
<?php /**PATH C:\laragon\www\zahrat-al-madina\resources\views/site/fruits-and-vegetables.blade.php ENDPATH**/ ?>