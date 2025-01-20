@extends('layouts.default')

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
