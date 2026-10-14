<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Page;
use App\Models\ProduceItem;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Seed the website's public content.
     */
    public function run(): void
    {
        Setting::putMany([
            'site_name' => 'Zahrat Al Madina',
            'tagline' => 'Fruits & Vegetables',
            'logo_path' => '/images/logo.png',
            'address' => 'Shop No 65, Block Number 2, Central Fruit & Vegetable Market, Al Aweer, Dubai, UAE',
            'sales_label' => 'Malik Zafar Mureed',
            'sales_phone' => '+971 50 252 8036',
            'telephone_label' => 'Telephone',
            'telephone' => '+971 50 538 6979',
            'email_info' => 'info@zahratalmadinafruitsandveg.com',
            'email_hr' => 'hr@zahratalmadinafruitsandveg.com',
            'hours_weekdays' => 'Monday – Friday: 8am – 10pm',
            'hours_saturday' => 'Saturday: 10am – 3pm',
            'hours_sunday' => 'Sunday: Closed',
            'map_embed_url' => 'https://www.google.com/maps?q=Central+Fruit+and+Vegetable+Market+Al+Aweer+Dubai&output=embed',
            'cta_label' => 'Get Quota',
            'copyright' => 'Copyright © 2026 Zahrat Al Madina',
        ]);

        Page::query()->updateOrCreate(['slug' => 'home'], [
            'title' => 'Zahrat Al Madina | Fresh Fruits & Vegetables, Dubai',
            'meta_description' => 'Premium-quality fruits and vegetables. Import, export and wholesale distribution from Al Aweer Central Market, Dubai, UAE.',
            'hero_title' => 'Freshness You Can Trust, Quality You Deserve',
            'hero_subtitle' => 'Welcome to Zahrat Al Madina, your trusted source for premium-quality fruits and vegetables in the UAE and beyond.',
            'hero_image' => null,
            'extra' => [
                'intro_title' => 'Global Export & Import',
                'intro_body' => 'We specialize in importing the finest produce from around the world and exporting fresh, hand-picked fruits and vegetables to international markets. With a commitment to freshness, quality, and sustainability, we ensure that every product we deliver meets the highest standards. Whether you\'re a wholesaler, retailer, or distributor, we are your reliable partner in fresh produce.',
                'cta_title' => 'Get in touch with us',
                'cta_body' => 'We\'d love to hear from you. Whether you\'re looking for a fresh produce supply or want to partner with us, reach out today.',
                'cta_button' => 'Contact',
            ],
        ]);

        Page::query()->updateOrCreate(['slug' => 'about'], [
            'title' => 'About | Zahrat Al Madina',
            'meta_description' => 'Seasonal and exotic fruits and vegetables for businesses, supermarkets, restaurants and wholesalers. Our mission, vision and values.',
            'hero_title' => 'About',
            'hero_subtitle' => null,
            'hero_image' => null,
            'extra' => [
                'section_title' => 'About us',
                'lead' => 'We take pride in offering a diverse selection of seasonal and exotic fruits and vegetables, catering to businesses, supermarkets, restaurants, and wholesalers. Our commitment to excellence and sustainability drives us to deliver fresh, nutritious, and pesticide-free produce at competitive prices.',
                'why_title' => 'Why choose us?',
                'why_choose' => [
                    'High-quality produce',
                    'Reliable global supply chain',
                    'Freshness guaranteed',
                    'Competitive pricing',
                    'Customer satisfaction',
                ],
                'mission' => 'We are committed to delivering the freshest, highest-quality fruits and vegetables while ensuring sustainability, customer satisfaction, and global accessibility.',
                'vision' => 'To be a leading supplier of fresh produce, recognized for quality, reliability, and eco-friendly practices.',
                'values' => [
                    'Quality First',
                    'Customer Commitment',
                    'Sustainability',
                ],
            ],
        ]);

        Page::query()->updateOrCreate(['slug' => 'services'], [
            'title' => 'Services | Zahrat Al Madina',
            'meta_description' => 'Import, export and wholesale distribution of fresh fruits and vegetables from Dubai, UAE.',
            'hero_title' => 'Services',
            'hero_subtitle' => null,
            'hero_image' => null,
            'extra' => [
                'faq_title' => 'F.A.Q.',
            ],
        ]);

        Page::query()->updateOrCreate(['slug' => 'contact'], [
            'title' => 'Contact | Zahrat Al Madina',
            'meta_description' => 'Contact Zahrat Al Madina at Al Aweer Central Market, Dubai. Phone, email, business hours and enquiry form.',
            'hero_title' => 'Contact',
            'hero_subtitle' => null,
            'hero_image' => null,
            'extra' => [
                'intro_title' => 'Get in touch',
                'form_title' => 'Send us a message',
            ],
        ]);

        $services = [
            [
                'title' => 'Import of Fresh Fruits & Vegetables',
                'icon' => '🥬',
                'theme' => 'import',
                'excerpt' => 'Premium produce from trusted farms worldwide.',
                'body' => 'We source premium-quality produce from trusted farms worldwide, ensuring freshness and superior taste. Our import network includes leading agricultural hubs, providing a consistent supply of fresh fruits and vegetables.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Export of Fruits & Vegetables',
                'icon' => '✈️',
                'theme' => 'export',
                'excerpt' => 'Hand-picked produce for international markets.',
                'body' => 'Our export division ensures that fresh, hand-picked produce reaches international markets with top-notch packaging and logistics solutions. We cater to wholesalers, supermarkets, and food industries worldwide.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Wholesale Distribution',
                'icon' => '🚚',
                'theme' => 'wholesale',
                'excerpt' => 'Bulk supply for hotels, stores and restaurants.',
                'body' => 'We supply fresh fruits and vegetables in bulk to supermarkets, grocery stores, hotels, and restaurants. Our commitment to timely deliveries and exceptional quality ensures customer satisfaction.',
                'sort_order' => 3,
            ],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['title' => $service['title']],
                [...$service, 'is_active' => true],
            );
        }

        Page::query()->updateOrCreate(['slug' => 'fruits-and-vegetables'], [
            'title' => 'Fruits & Vegetables | Zahrat Al Madina',
            'meta_description' => 'Explore our wide selection of fresh seasonal fruits and vegetables. Premium quality produce sourced from global farms, available for wholesale and export.',
            'hero_title' => 'Fruits & Vegetables',
            'hero_subtitle' => 'Fresh, seasonal and premium-quality produce sourced from trusted farms around the world.',
            'hero_image' => null,
            'extra' => [],
        ]);

        $produce = [
            // Fruits
            ['name' => 'Apples', 'category' => 'fruit', 'icon' => '🍎', 'theme' => 't4', 'sort_order' => 1],
            ['name' => 'Oranges', 'category' => 'fruit', 'icon' => '🍊', 'theme' => 't5', 'sort_order' => 2],
            ['name' => 'Bananas', 'category' => 'fruit', 'icon' => '🍌', 'theme' => 't2', 'sort_order' => 3],
            ['name' => 'Mangoes', 'category' => 'fruit', 'icon' => '🥭', 'theme' => 't5', 'sort_order' => 4],
            ['name' => 'Grapes', 'category' => 'fruit', 'icon' => '🍇', 'theme' => 't4', 'sort_order' => 5],
            ['name' => 'Strawberries', 'category' => 'fruit', 'icon' => '🍓', 'theme' => 't6', 'sort_order' => 6],
            ['name' => 'Watermelons', 'category' => 'fruit', 'icon' => '🍉', 'theme' => 't3', 'sort_order' => 7],
            ['name' => 'Avocados', 'category' => 'fruit', 'icon' => '🥑', 'theme' => 't3', 'sort_order' => 8],
            ['name' => 'Lemons', 'category' => 'fruit', 'icon' => '🍋', 'theme' => 't5', 'sort_order' => 9],
            ['name' => 'Pomegranates', 'category' => 'fruit', 'icon' => '🍎', 'theme' => 't6', 'sort_order' => 10],
            // Vegetables
            ['name' => 'Tomatoes', 'category' => 'vegetable', 'icon' => '🍅', 'theme' => 't6', 'sort_order' => 1],
            ['name' => 'Cucumber', 'category' => 'vegetable', 'icon' => '🥒', 'theme' => 't3', 'sort_order' => 2],
            ['name' => 'Carrots', 'category' => 'vegetable', 'icon' => '🥕', 'theme' => 't5', 'sort_order' => 3],
            ['name' => 'Bell Peppers', 'category' => 'vegetable', 'icon' => '🫑', 'theme' => 't3', 'sort_order' => 4],
            ['name' => 'Garlic', 'category' => 'vegetable', 'icon' => '🧄', 'theme' => 't1', 'sort_order' => 5],
            ['name' => 'Onions', 'category' => 'vegetable', 'icon' => '🧅', 'theme' => 't1', 'sort_order' => 6],
            ['name' => 'Broccoli', 'category' => 'vegetable', 'icon' => '🥦', 'theme' => 't3', 'sort_order' => 7],
            ['name' => 'Lettuce', 'category' => 'vegetable', 'icon' => '🥬', 'theme' => 't3', 'sort_order' => 8],
            ['name' => 'Potatoes', 'category' => 'vegetable', 'icon' => '🥔', 'theme' => 't1', 'sort_order' => 9],
            ['name' => 'Cauliflower', 'category' => 'vegetable', 'icon' => '🥦', 'theme' => 't2', 'sort_order' => 10],
        ];

        foreach ($produce as $item) {
            ProduceItem::query()->updateOrCreate(['name' => $item['name']], $item);
        }

        $faqs = [
            [
                'question' => 'Where do you source your fruits and vegetables from?',
                'answer' => 'We work with trusted farms and agricultural hubs around the world, and supply the local market from our shop at the Al Aweer Central Market in Dubai.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Do you offer wholesale pricing?',
                'answer' => 'Yes. We offer competitive bulk pricing for supermarkets, grocery stores, hotels, restaurants and distributors. Contact our sales manager for a quote.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Can I place a custom order for specific fruits and vegetables?',
                'answer' => 'Yes. Tell us the products, quantities and delivery dates you need and we\'ll confirm availability and pricing.',
                'sort_order' => 3,
            ],
            [
                'question' => 'How can I ensure the freshness of your produce?',
                'answer' => 'Every order is sourced, handled and delivered with freshness in mind, and our produce is backed by our freshness guarantee.',
                'sort_order' => 4,
            ],
            [
                'question' => 'How can I contact you for bulk orders or inquiries?',
                'answer' => 'Call or email us using the details on our contact page, or send a message through the form.',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
