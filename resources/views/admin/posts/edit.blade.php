@extends('layouts.admin')

@section('title', $post->exists ? 'Edit: ' . $post->title : 'New Post')

@section('body.class', 'admin posts edit')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('main')
    <header>
        @if($post->exists)
        <h1>Edit: {{ $post->title }}</h1>
        @else
        <h1>New Post</h1>
        @endif
    </header>
    <form action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @if($post->exists)
        @method('PUT')
        @endif
        @csrf
        <div class="fieldset">
            <div class="overview">
                <h3>General Settings</h3>
                <p>Edit your post's title, URL, and more.</p>
            </div>
            <section>
                <label for="post-title">Title</label>
                <input id="post-title" name="title" placeholder="Title goes here..." value="{{ old('title', $post->title) }}">
                
                <label for="post-url">URL</label>
                <span class="labeled-input">
                    <label for="post-url">{{ url('posts') }}/</label>
                    <input id="post-url" name="slug" value="{{ old('slug', $post->slug) }}">
                </span>

                <label for="post-tags">Tags</label>
                <span class="tags-input" data-tags="{{ json_encode(old('tags', $post->tags->map->name)) }}" data-id="post-tags" data-name="tags">
                    <span contenteditable placeholder="Type a comma-separated list of tags..."></span>
                </span>
            </section>
        </div>
        <div class="fieldset">
            <div class="overview">
                <h3>Content</h3>
                <p>The content of your blog post.</p>
            </div>
            <section>
                <label for="post-image">Featured Image</label>
                @if($post->image)
                <img src="{{ Storage::url($post->image) }}" />
                @endif
                <input accept="image/*" id="post-image" name="image" type="file">

                <label for="post-content">Content</label>
                <div class="code-editor" data-id="post-content" data-name="content" data-token="{{ csrf_token() }}" data-upload-url="{{ route('admin.posts.upload', $post->id ?? 'new') }}" data-value="{{ old('content', $post->content) }}"></div>

                <label for="post-excerpt">Excerpt</label>
                <textarea id="post-excerpt" name="excerpt" rows="5">{{ old('excerpt', $post->getAttributes()['excerpt'] ?? '') }}</textarea>
            </section>
        </div>
        <div class="actions">
            <button class="primary">Save</button>
        </div>
    </form>
@endsection
