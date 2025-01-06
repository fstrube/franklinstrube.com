@extends('layouts.default')

@section('content')
    <div role="main" class="main">
        @foreach($posts as $post)
        <div class="excerpt">
            <article>
                <h2><a href="{{ $post->url }}" title="{{ $post->title }}">{{ $post->title }}</a></h2>
                {!! $post->excerpt !!}
                @if ($post->published_at)
                <time datetime="{{ $post->published_at->format('c') }}">Posted on {{ $post->published_at->format('l, F j, Y'); }}</time>
                @endif
                <div class="tags">
                    @foreach($post->tags as $tag)
                    <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </article>
        </div>
        @endforeach
    </div>
@endsection