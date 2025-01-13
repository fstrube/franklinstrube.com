<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('blog.home') }}</loc>
        <lastmod>{{ App\Models\BlogPost::published()->orderBy('published_at', 'desc')->first()->published_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    @foreach(App\Models\BlogPost::published()->orderBy('published_at', 'desc')->get() as $post)
    <url>
        <loc>{{ $post->url }}</loc>
        <lastmod>{{ $post->published_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
   @endforeach
</urlset>