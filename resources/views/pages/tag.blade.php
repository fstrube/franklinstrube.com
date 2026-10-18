@extends('layouts.default')

@section('title')
    Tag - {{ $tag->name }}
@endsection

@section('content')
    <div role="main" class="main">
        <div class="tag-intro">
            <h2>All posts tagged with "{{ $tag->name }}":</h2>
        </div>

        @foreach($tag->posts as $post)
        <div class="excerpt">
            <article>
                <div
                    class="post-title {{ $post->image ? 'with-image' : '' }}"
                    @if($post->image)
                    style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.75)), url({{ Storage::url($post->image) }});"
                    @endif
                >
                    <a href="{{ $post->url }}" title="{{ $post->title }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </div>
                <p>{!! $post->excerpt !!}</p>
                <div class="tags">
                    @foreach($post->tags as $tag)
                    <a class="tag" href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a>
                    @endforeach
                </div>
                @if ($post->published_at)
                <time datetime="{{ $post->published_at->format('c') }}">Posted on {{ $post->published_at->format('l, F j, Y'); }}</time>
                @endif
            </article>
        </div>
        @endforeach
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
