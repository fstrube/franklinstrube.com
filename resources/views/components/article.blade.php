<div class="article">
    <article>
        <h1
            class="post-title {{ $image ?? null ? 'with-image' : '' }}"
            @if($image ?? null)
            style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.75)), url({{ $image }})"
            @endif
        >{{ $title }}</h1>
        @if($published_at ?? null)
            <time class="date updated published-at" datetime="{{ $published_at->format('c') }}">Posted on {{ $post->published_at->format('l, F j, Y')}}</time>
        @endif
        <div class="tags">
            @foreach($tags ?? [] as $tag)
            <span class="tag">#{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="content">
            {{ new Illuminate\Support\HtmlString(app('markdown')->convert($slot)) }}
        </div>
    </article>
</div>
