<meta name="og:description" content="{{ data_get($post, 'seo.description') ?? $post->excerpt }}">
<meta name="og:title" content="{{ $post->title }}">
@if($post->image)
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:image" content="{{ url(Storage::url($post->image)) }}">
@else
    <meta name="og:image" content="{{ url('favicon.png') }}">
@endif
<meta name="og:type" content="article">
<meta name="og:site_name" content="#!/bin/strube" />
<meta name="og:url" content="{{ route('blog.posts.show', $post->slug) }}">
