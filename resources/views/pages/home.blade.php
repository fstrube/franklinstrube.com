@extends('layouts.default')

@section('title')
    Home
@endsection

@section('content')
    <div role="main" class="main">
        @foreach($posts as $post)
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
                    <span>#{{ $tag->name }}</span>
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
