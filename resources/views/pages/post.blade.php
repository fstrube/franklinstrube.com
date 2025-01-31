@extends('layouts.default')

@section('title', $post->title)

@section('head')
    <meta name="description" content="{{ data_get($post, 'seo.description') ?? $post->excerpt }}">
    <meta name="og:title" content="{{ $post->title }} &laquo; #!/bin/strube">
    @if($post->image)
    <meta property="og:image" content="{{ url(Storage::url($post->image)) }}">
    @endif
    <meta name="og:type" content="article">
    <meta property="og:site_name" content="#!/bin/strube" />
    <meta name="og:url" content="{{ route('blog.posts.show', $post) }}">
    <link rel="canonical" href="{{ route('blog.posts.show', $post) }}">
@endsection

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article :image="$post->image ?? ''" :published_at="$post->published_at" :tags="$post->tags" :title="$post->title">
            {!! $post->html !!}
        </x-article>
        <nav class="nav-single">
            @if($previous)
            <span class="nav-previous">
                <a href="{{ $previous->url }}">&larr; {{ $previous->title }}</a>
            </span>
            @endif
            @if($next)
            <span class="nav-next">
                <a href="{{ $next->url }}">{{ $next->title }} &rarr;</a>
            </span>
            @endif
        </nav>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
