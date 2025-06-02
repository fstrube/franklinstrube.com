@php
    $projects = [
        'banjo',
        'civ',
        'frak',
        'gridz',
        'mastering-magento-videos',
        'mythos',
        'scorecard',
    ];
@endphp
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('blog.home') }}</loc>
        <lastmod>{{ App\Models\BlogPost::published(now())->
            orderBy('published_at', 'desc')->first()->published_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    {{-- Project pages--}}
    @foreach($projects as $project)
    <url>
        <loc>{{ route('projects.show', $project) }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
    </url>
    @endforeach
    {{-- Blog posts--}}
    @foreach(App\Models\BlogPost::published(now())->orderBy('published_at', 'desc')->get() as $post)
    <url>
        <loc>{{ $post->url }}</loc>
        <lastmod>{{ $post->published_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    @endforeach
    {{-- Tags --}}
    @foreach(App\Models\Tag::query()->orderBy('name')->get() as $tag)
    <url>
        <loc>{{ route('tags.show', $tag) }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
    </url>
    @endforeach
    {{-- Tools --}}
    <url>
        <loc>{{ route('tools.markdown-to-pdf') }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
    </url>
</urlset>
