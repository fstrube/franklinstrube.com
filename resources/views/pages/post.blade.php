@extends('layouts.default')

@section('content')
    <div role="main" class="main">
        {!! $post->content !!}
        <nav class="nav-single">
            <h3 class="assistive-text">Post Navigation</h3>
            <span class="nav-previous">
                <a href="{{ $previous }}">&larr;</a>
            <span class="nav-next">
                <a href="{{ $next }}">&rarr;</a>
            </span>
        </nav>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection