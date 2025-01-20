@extends('layouts.default')

@section('title')
    Projects
@endsection

@php
    $projects = [
        [
            'title' => 'Banjo',
            // 'image' => '/images/pages/scorecard.png',
            'url' => 'https://morevang.com/banjo',
            'external' => true,
            'excerpt' => 'A PDF rendering engine and print automation platform.',
        ],
        [
            'title' => 'Frak',
            'url' => route('projects.show', 'frak'),
            'excerpt' => 'A generic deployment tool for syncing a local codebase with a remote server.',
        ],
        [
            'title' => 'Gridz',
            'url' => route('projects.show', 'gridz'),
            'excerpt' => 'A window resizing utility for Linux.',
        ],
        [
            'title' => 'Mythos',
            // 'image' => '/images/pages/scorecard.png',
            'url' => 'https://mythosplatform.com',
            'external' => true,
            'excerpt' => 'A niche content management system and communications platform.',
        ],
        [
            'title' => 'Scorecard',
            // 'image' => '/images/pages/scorecard.png',
            'url' => route('projects.show', 'scorecard'),
            'excerpt' => 'A checklist creator that calculates a score based on what you check in the form.'
        ],
        [
            'title' => 'SVG - Civilization II',
            'url' => route('projects.show', 'civ'),
            'excerpt' => 'Recreate the Civilization II map in SVG.'
        ],
        [
            'title' => 'Video Course - Mastering Magento',
            'url' => route('projects.show', 'mastering-magento-videos'),
            'excerpt' => 'A video course designed to teach the ins and outs of Magento, an open-source e-commerce platform. This course if for Magento 1.x, so it is outdated at this point.'
        ],
    ];
@endphp

@section('content')
    <div role="main" class="main">
        <div class="excerpt">
            <article>
                <p>I've been working in tech for over {{ floor(abs(now()->diffInYears('June 2008'))) }} years. These are some of the things that I've worked on over the years. Ranging from fun little side projects to full-time work.</p>
            </article>
        </div>
        @foreach($projects as $project)
        <div class="excerpt">
            <article>
                <div
                    class="post-title {{ $project['image'] ?? null ? 'with-image' : '' }}"
                    @if($project['image'] ?? null)
                    style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.75)), url({{ $project['image'] }});"
                    @endif
                >
                    <a href="{{ $project['url'] }}" title="{{ $project['title'] }}" {{ $project['external'] ?? null ? 'target="_blank"' : '' }}>
                        <h2>{{ $project['title'] }}</h2>
                    </a>
                </div>
                <p>{!! $project['excerpt'] ?? '' !!}</p>
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
