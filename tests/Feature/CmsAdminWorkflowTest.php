<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\NavigationItem;
use App\Models\NewsEvent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CmsAdminWorkflowTest extends TestCase
{
    public function test_public_content_pages_render(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('Expand Your Programming Knowledge')
            ->assertDontSee('The Ultimate Guide to Game Development');
        $this->get('/services')
            ->assertOk()
            ->assertDontSee('Expand Your Programming Knowledge')
            ->assertDontSee('The Ultimate Guide to Game Development');
        $this->get('/blogs')->assertOk()->assertSee('Data Protection Compliance Readiness');
        $this->get('/blogs/data-protection-compliance-readiness')->assertOk()->assertSee('Data Protection Compliance Readiness');
        $this->get('/events')
            ->assertOk()
            ->assertSee('GDPR Certified Data Protection Officer')
            ->assertSee('13th July - 17th July, 2026')
            ->assertDontSee('11th Aug - 5th Sept, 2025');
        $this->get('/events/pecb-course')
            ->assertOk()
            ->assertSee('$1,200')
            ->assertSee('13th July - 17th July, 2026')
            ->assertDontSee('August 2025')
            ->assertDontSee('5th September, 2025');
    }

    public function test_admin_content_sections_render_for_admin_user(): void
    {
        $user = User::query()->firstOrCreate(
            ['email' => 'admin@silhamconsulting.co.zm'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin@1234'),
            ],
        );

        $this->actingAs($user);

        $this->get('/admin')->assertOk();
        $this->get('/admin/cms-pages')->assertOk();
        $this->get('/admin/blog-posts')->assertOk();
        $this->get('/admin/blog-posts/create')->assertOk()->assertSee('Story content');
        $this->get('/admin/news-events')->assertOk()->assertSee('GDPR Certified Data Protection Officer');
        $this->get('/admin/news-events/create')->assertOk()->assertSee('Registration link');
        $this->get('/admin/navigation-items')->assertOk();
        $this->get('/admin/navigation-items/create')->assertOk()->assertSee('Parent menu');
    }

    public function test_public_pages_do_not_render_placeholder_images(): void
    {
        $paths = [
            '/',
            '/about-us',
            '/blogs',
            '/contact-us',
            '/Outsourced-Data-Protection-Officer',
            '/Data-Protection-Training',
            '/Data-Protection-Consultancy',
            '/Data-Protection-Auditor-Services',
            '/Banking-and-Finance',
            '/Medical-and-Healthcare',
            '/Technology',
            '/Raising-Awareness-through-Data-Protection-Awareness-Workshops',
            '/Demonstrating-Compliance-through-Data-Audits',
            '/news-events/data-governance-workshop',
        ];

        $placeholderPaths = [
            'assets/img/750/450.jpg',
            'assets/img/262x230/9.jpg',
            'assets/img/breadcrumb-bg.jpg',
            'assets/img/1920/658_2.jpg',
            'assets/img/1920/530.jpg',
            'assets/img/384x320/3.jpg',
            'assets/img/360x300/4.jpg',
            'assets/img/blog/standard/1.jpg',
        ];

        foreach ($paths as $path) {
            $response = $this->get($path)->assertOk();

            foreach ($placeholderPaths as $placeholderPath) {
                $response->assertDontSee($placeholderPath);
            }
        }
    }

    public function test_blog_posts_can_be_created_without_json_or_html_fields(): void
    {
        $post = BlogPost::query()->updateOrCreate(
            ['slug' => 'admin-managed-test-post'],
            [
                'title' => 'Admin Managed Test Post',
                'category' => 'CMS',
                'author' => 'Silham',
                'excerpt' => 'Created through regular form fields.',
                'body' => '<p>This content is edited through a rich text editor.</p>',
                'published_at' => now()->toDateString(),
                'is_published' => true,
            ],
        );

        $this->get($post->publicUrl())
            ->assertOk()
            ->assertSee('Admin Managed Test Post')
            ->assertSee('rich text editor');

        $post->delete();
    }

    public function test_events_news_and_menu_items_can_be_managed_with_regular_fields(): void
    {
        $event = NewsEvent::query()->create([
            'title' => 'Admin Managed Event',
            'slug' => 'admin-managed-event',
            'type' => 'event',
            'excerpt' => 'Created through regular event fields.',
            'body' => '<p>Event content edited in the rich text editor.</p>',
            'starts_at' => now()->toDateString(),
            'location' => 'Virtual Delivery',
            'price' => '$1,200 per person',
            'is_published' => true,
        ]);

        $menuItem = NavigationItem::query()->create([
            'label' => 'Admin Test Page',
            'url' => '/admin-managed-event',
            'sort_order' => 999,
            'is_active' => true,
        ]);

        $this->get($event->publicUrl())
            ->assertOk()
            ->assertSee('Admin Managed Event')
            ->assertSee('Virtual Delivery');

        $menuItem->delete();
        $event->delete();
    }
}
