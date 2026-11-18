<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_pages_return_200(): void
    {
        $routes = ['/', '/features', '/solutions/defence-government', '/solutions/banking-finance', '/solutions/corporate', '/security', '/deployment', '/how-we-work', '/faq', '/about', '/contact', '/privacy', '/terms', '/thank-you'];
        foreach ($routes as $r) {
            $this->get($r)->assertStatus(200);
        }
    }

    public function test_sitemap(): void
    {
        $this->get('/sitemap.xml')->assertStatus(200)->assertSee('urlset')->assertSee('/features');
    }

    public function test_robots(): void
    {
        $this->get('/robots.txt')->assertStatus(200)->assertSee('Sitemap');
    }

    public function test_404(): void
    {
        $this->get('/does-not-exist')->assertStatus(404);
    }
}
