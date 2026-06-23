<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\NavigationItem;
use App\Models\NewsEvent;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@silhamconsulting.co.zm');
        $adminPassword = env('ADMIN_PASSWORD', 'Admin@1234');

        User::query()->updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Admin',
                'password' => Hash::make($adminPassword),
            ]
        );

        $this->call([
            CmsSeeder::class,
        ]);

        $this->seedManagedContent();
        $this->seedManagedEvents();
        $this->seedNavigation();
    }

    private function seedManagedContent(): void
    {
        if (! Schema::hasTable('blog_posts')) {
            return;
        }

        BlogPost::query()->updateOrCreate(
            ['slug' => 'data-protection-compliance-readiness'],
            [
                'title' => 'Data Protection Compliance Readiness',
                'category' => 'Data Protection',
                'author' => 'Silham',
                'image' => 'assets/img/home/carousel/IMAGE07_12.jpg',
                'excerpt' => 'Practical steps organisations can take to prepare for data protection compliance.',
                'body' => '<p>Data protection compliance starts with understanding what personal data your organisation processes, why it is processed, where it is stored, who has access to it, and how it is protected.</p><p>Silham Consulting and Training Services supports organisations with readiness assessments, staff awareness, privacy governance, audits, and practical implementation of data protection controls.</p>',
                'published_at' => now()->toDateString(),
                'is_published' => true,
                'sort_order' => 1,
                'meta_title' => 'Data Protection Compliance Readiness | Silham',
                'meta_description' => 'Practical data protection compliance readiness guidance from Silham Consulting and Training Services.',
            ],
        );
    }

    private function seedManagedEvents(): void
    {
        if (! Schema::hasTable('news_events')) {
            return;
        }

        $events = [
            [
                'slug' => 'pecb-course',
                'title' => 'GDPR Certified Data Protection Officer (CDPO) Course',
                'type' => 'event',
                'image' => 'assets/img/home/events/pecb-cdpo-course-2026.png',
                'excerpt' => 'Silham Consulting and Training Services, in conjunction with PECB of Canada, will run the GDPR Certified Data Protection Officer course.',
                'body' => '<p>Silham Consulting and Training Services, in conjunction with Professional Evaluation and Certification Board (PECB) of Canada, will be running the GDPR Certified Data Protection Officer (CDPO) Course in July 2026.</p><p>The course is delivered virtually and is designed for Data Protection Officers, aspiring DPOs, compliance regulators, consultants, practitioners, and managers who need practical data protection compliance knowledge.</p><p>The course fee includes tuition, course material, examination, PECB certificate, and Silham certificate of course completion.</p>',
                'starts_at' => '2026-07-13',
                'ends_at' => '2026-07-17',
                'time_text' => '9AM - 4PM',
                'location' => 'Virtual Delivery',
                'price' => '$1,200 per person',
                'registration_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSehTitcpNv6eR6Ts14X21Hvd_uYrodOIZ5nLHO0oshLj7J4EQ/viewform',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 10,
                'meta_title' => 'GDPR Certified Data Protection Officer (CDPO) Course | Silham',
                'meta_description' => 'Register for the PECB GDPR Certified Data Protection Officer course hosted by Silham Consulting and Training Services in July 2026.',
            ],
            [
                'slug' => 'data-governance-workshop',
                'title' => 'CEO Attends AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop',
                'type' => 'news',
                'image' => 'assets/img/home/events/silmevent.webp',
                'excerpt' => 'Stakeholder engagement workshop on Zambia\'s data governance policy development.',
                'body' => '<p>Silham Consulting and Training Services CEO attended the AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop in Kabwe, Zambia.</p><p>The workshop brought stakeholders together to discuss policy development, implementation priorities, and practical data governance considerations.</p>',
                'starts_at' => '2024-09-16',
                'ends_at' => '2024-09-18',
                'time_text' => null,
                'location' => 'Kabwe, Zambia',
                'price' => null,
                'registration_url' => null,
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 20,
                'meta_title' => 'AUDA-NEPAD Data Governance Policy Workshop | Silham',
                'meta_description' => 'Silham CEO attends AUDA-NEPAD data governance policy stakeholder engagement workshop in Kabwe.',
            ],
            [
                'slug' => 'trainers-workshop',
                'title' => 'CEO Attends AUDA-NEPAD Training of Trainers Workshop',
                'type' => 'news',
                'image' => 'assets/img/home/events/two.jpg',
                'excerpt' => 'Training of trainers workshop focused on data governance and data protection capacity building.',
                'body' => '<p>Silham Consulting and Training Services CEO attended the AUDA-NEPAD Training of Trainers Workshop in Lusaka, Zambia.</p><p>The workshop focused on building capacity for data governance, data protection, and practical knowledge transfer.</p>',
                'starts_at' => '2024-08-20',
                'ends_at' => '2024-08-22',
                'time_text' => null,
                'location' => 'Lusaka, Zambia',
                'price' => null,
                'registration_url' => null,
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 30,
                'meta_title' => 'AUDA-NEPAD Training of Trainers Workshop | Silham',
                'meta_description' => 'Silham CEO attends AUDA-NEPAD Training of Trainers Workshop in Lusaka.',
            ],
            [
                'slug' => 'press-release',
                'title' => 'Press Release',
                'type' => 'news',
                'image' => 'assets/img/home/events/lvs.jpeg',
                'excerpt' => 'PECB signs a partnership agreement with Silham Consulting.',
                'body' => '<p>PECB signed a partnership agreement with Silham Consulting and Training Services.</p><p>The partnership supports access to recognised professional certification and training opportunities in data protection and related fields.</p>',
                'starts_at' => '2024-09-23',
                'ends_at' => null,
                'time_text' => null,
                'location' => 'Global',
                'price' => null,
                'registration_url' => null,
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 40,
                'meta_title' => 'PECB Partnership Press Release | Silham',
                'meta_description' => 'PECB signs a partnership agreement with Silham Consulting and Training Services.',
            ],
            [
                'slug' => 'data-protection-training-health-sector',
                'title' => 'CEO & Principal Consultant Delivers Data Protection Awareness Training to the Health Sector',
                'type' => 'news',
                'image' => 'assets/img/home/events/lsd.jpeg',
                'excerpt' => 'Data protection awareness training delivered to health sector participants.',
                'body' => '<p>Silham Consulting and Training Services delivered data protection awareness training to participants from the health sector in Kabwe, Zambia.</p><p>The training covered practical privacy, data protection, and compliance awareness topics for health-sector operations.</p>',
                'starts_at' => '2024-09-16',
                'ends_at' => '2024-09-18',
                'time_text' => null,
                'location' => 'Kabwe, Zambia',
                'price' => null,
                'registration_url' => null,
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 50,
                'meta_title' => 'Health Sector Data Protection Awareness Training | Silham',
                'meta_description' => 'Silham delivers data protection awareness training to health sector participants in Kabwe.',
            ],
        ];

        foreach ($events as $event) {
            NewsEvent::query()->updateOrCreate(
                ['slug' => $event['slug']],
                $event,
            );
        }
    }

    private function seedNavigation(): void
    {
        if (! Schema::hasTable('navigation_items')) {
            return;
        }

        $items = [
            [
                'label' => 'Services',
                'sort_order' => 10,
                'children' => [
                    ['label' => 'Outsourced Data Protection Officer (DPO)', 'route_name' => 'services.dpo', 'sort_order' => 10],
                    ['label' => 'Data Protection Training', 'route_name' => 'services.dpt', 'sort_order' => 20],
                    ['label' => 'Data Protection Consultancy', 'route_name' => 'services.dpc', 'sort_order' => 30],
                    ['label' => 'Data Protection Auditor Services', 'route_name' => 'services.dpas', 'sort_order' => 40],
                ],
            ],
            [
                'label' => 'Sector',
                'sort_order' => 20,
                'children' => [
                    ['label' => 'Banking & Finance', 'route_name' => 'sectors.one', 'sort_order' => 10],
                    ['label' => 'Pensions & Insurance', 'route_name' => 'sectors.two', 'sort_order' => 20],
                    ['label' => 'Medical & Healthcare', 'route_name' => 'sectors.three', 'sort_order' => 30],
                    ['label' => 'Technology', 'route_name' => 'sectors.four', 'sort_order' => 40],
                    ['label' => 'Education', 'route_name' => 'sectors.five', 'sort_order' => 50],
                    ['label' => 'Non-Governmental Organisations', 'route_name' => 'sectors.six', 'sort_order' => 60],
                ],
            ],
            ['label' => 'About Us', 'route_name' => 'about', 'sort_order' => 30],
            ['label' => 'Events & News', 'route_name' => 'events', 'sort_order' => 40],
            ['label' => 'Blog', 'route_name' => 'blog', 'sort_order' => 50],
            ['label' => 'Contact Us', 'route_name' => 'contact', 'sort_order' => 60],
            ['label' => "FAQ's", 'route_name' => 'faqs', 'sort_order' => 70],
        ];

        foreach ($items as $item) {
            $children = $item['children'] ?? [];
            unset($item['children']);

            $parent = NavigationItem::query()->updateOrCreate(
                ['label' => $item['label'], 'parent_id' => null],
                $item + ['is_active' => true],
            );

            foreach ($children as $child) {
                NavigationItem::query()->updateOrCreate(
                    ['label' => $child['label'], 'parent_id' => $parent->id],
                    $child + ['is_active' => true],
                );
            }
        }
    }
}
