@extends('layouts.admin')

@section('title', $post->title . ' &raquo; Edit')

@section('body.class', 'admin posts edit')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('main')
    <header>
        <h1>Edit: {{ $post->title }}</h1>
    </header>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @method('PUT')
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
                    <label for="post-url">{{ url('') }}/</label>
                    <input id="post-url" name="slug" value="{{ old('url', $post->slug) }}">
                </span>

                <label for="post-tags">Tags</label>
                <span class="tags-input" data-tags="{{ $post->tags->map->name }}" data-name="tags">
                    <span contenteditable placeholder="Type a comma-separated list of tags..."></span>
                </span>
            </section>
        </div>
        <div class="fieldset">
            <div class="overview">
                <h3>Content</h3>
                <p>The content for your blog post.</p>
            </div>
            <section>
                <div class="code-editor" data-name="content" data-value="{{ $post->content }}"></div>
            </section>
        </div>
        <div class="actions">
            <button class="primary">Save</button>
        </div>
    </form>
@endsection