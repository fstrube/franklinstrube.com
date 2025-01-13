<?php
namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Tag;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    public function test_blog_posts(): void
    {
        BlogPost::factory()->create();

        BlogPost::factory()->has(Tag::factory())->create();

        $this->assertTrue(true);
    }
}
