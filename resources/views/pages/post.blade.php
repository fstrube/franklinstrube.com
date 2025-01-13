@extends('layouts.default')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <div class="article">
            <article>
                <h1 
                    class="post-title {{ $post->image ? 'with-image' : '' }}"
                    @if($post->image)
                    style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.75)), url({{ Storage::url($post->image) }})"
                    @endif
                >{{ $post->title }}</h1>
                <time class="date updated published-at" datetime="{{ $post->published_at->format('c') }}">Posted on {{ $post->published_at->format('l, F j, Y')}}</time>
                <div class="tags">
                    @foreach($post->tags as $tag)
                    <span class="tag">#{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="content">
                    {!! $post->html !!}
                </div>
            </article>
        </div>
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