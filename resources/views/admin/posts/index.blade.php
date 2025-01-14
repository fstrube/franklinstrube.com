@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('body.class', 'admin posts index')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('main')
    <header>
        <h1>Blog Posts</h1>
        <ul class="actions">
            <li><a href="{{ route('admin.posts.create') }}">New Post</a></li>
        </ul>
    </header>

    <form action="" class="search" method="GET">
        <label for="search">Search</label>
        <input id="search" name="q" type="text" value="{{ request('q', '') }}" />
    </form>

    <x-grid :data="$posts" paginated>
        <x-slot:headers>
            <tr>
                <th>Title</th>
                <th>Tags</th>
                <th>Published</th>
                <th>Created At</th>
            </tr>
        </x-slot:headers>

        <x-slot:row>
            <tr>
                <td data-title="Title">
                    <div class="stacked">
                        <span>@{{ $item->title }}</span>
                        <span class="url"><strong>URL:</strong> <a class="truncate" href="@{{ $item->url }}" target="_blank" title="@{{ $item->url }}">@{{ parse_url($item->url, PHP_URL_PATH) }}</a></span>
                    </div>
                </td>
                <td data-title="Tags">
                    @@forelse ($item->tags as $tag)
                    <a class="tag" href="@{{ $tag->url }}">@{{ $tag->name }}</a>
                    @@empty
                    <em class="muted">None</em>
                    @@endforelse
                </td>
                <td data-title="Published">
                    @@if($item->published_at)
                    <time datetime="@{{ $item->published_at->format('c') }}" title="@{{ $item->published_at->format('F j, Y \a\t g:i A') }}">@{{ $item->published_at->diffForHumans() }}</time>
                    @@else
                    <i class="muted">Never</i>
                    @@endif
                </td>
                <td data-title="Created At">
                    <time datetime="@{{ $item->created_at->format('c') }}" title="@{{ $item->created_at->format('F j, Y \a\t g:i A') }}">@{{ $item->created_at->diffForHumans() }}</time>
                </td>
                <td data-title="Actions">
                    <div class="actions">
                        <a href="@{{ route('admin.posts.edit', $item)}}">
                            @include('icons.pencil-square')
                        </a>
                        <a href="#">
                            @include('icons.trash')
                        </a>
                    </div>
                </td>
            </tr>
        </x-slot:row>
    </x-grid>
@endsection
