@extends('layouts.default')

@section('title')
    Home
@endsection

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

@section('sidebar')
    <div role="sidebar" class="sidebar">
        <aside>
            @foreach ($asides as $aside)
                <div class="callout callout-{{ $aside->type }}">
                    <h2 class="callout-title">{{ $aside->title }}</h2>
                    <p>{!! $aside->content !!}</p>
                    <p><a title="{{ $aside->title }}" href="{{ $aside->url }}" target="_blank">Read More</a></p>
                    <time datetime="{{ $aside->published_at->format('c')}}">{{ $aside->published_at->format('l, F j, Y') }}</time>
                </div>
                @if ($loop->index % 3 === 0)
                    <div class="callout callout-ads">
                        <style>
                            .responsive-display-ads { width: 250px; height: 250px; margin: 0 auto; }
                            @media(min-width: 1100px) { .responsive-display-ads { width: 300px; height: 250px; } }
                            @media(min-width: 1280px) { .responsive-display-ads { width: 336px; height: 280px; } }
                        </style>
                        <!-- Responsive - Display Ads -->
                        <ins class="adsbygoogle responsive-display-ads"
                             style="display:block"
                             data-ad-client="ca-pub-3329123517640095"
                             data-ad-slot="7826480967"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                @endif
            @endforeach
            <div class="callout callout-ads">
                <!-- 336 x 280 - Text Ads -->
                <ins class="adsbygoogle"
                     style="display:block;width:336px;height:280px;margin:0 auto;"
                     data-ad-client="ca-pub-3329123517640095"
                     data-ad-slot="3117079768"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </aside>
    </div>
@endsection