@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('body.class', 'admin posts')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('main')
    <header>
        <h1>Blog Posts</h1>
    </header>

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
                <td>
                    <div class="stacked">
                        <span>@{{ $item->title }}</span>
                        <span class="url"><strong>URL:</strong> <a class="truncate" href="@{{ $item->url }}" target="_blank" title="@{{ $item->url }}">@{{ parse_url($item->url, PHP_URL_PATH) }}</a></span>
                    </div>
                </td>
                <td>
                    @@forelse ($item->tags as $tag)
                    <a class="tag" href="@{{ $tag->url }}">@{{ $tag->name }}</a>
                    @@empty
                    <em class="muted">None</em>
                    @@endforelse
                </td>
                <td>
                    <time datetime="@{{ $item->published_at->format('c') }}" title="@{{ $item->published_at->format('F j, Y \a\t g:i A') }}">@{{ $item->published_at->diffForHumans() }}</time>
                </td>
                <td>
                    <time datetime="@{{ $item->created_at->format('c') }}" title="@{{ $item->created_at->format('F j, Y \a\t g:i A') }}">@{{ $item->created_at->diffForHumans() }}</time>
                </td>
                <td>
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