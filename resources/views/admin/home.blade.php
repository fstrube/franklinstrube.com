@extends('layouts.admin')

@section('title', 'Home')

@section('body.class', 'admin')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('main')
    <header>
        <h1>Home</h1>
    </header>
    <section>
        Analytics - # Posts, # Asides, # Projects
    </section>
    <section>
        Latest Posts - Title, URL, Created/Updated, Published, Quick Actions (Edit, Delete)
    </section>
    <section>
        Quick Actions - New Post, New Aside, New Project
    </section>
@endsection