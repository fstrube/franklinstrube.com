@extends('layouts.default')

@section('title', 'Frak - Deployment Tool')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article title="Frak">
Frak is a deployment utility that I built long ago, when I was working primarily on Magento development. It is a wrapper around `rsync` with some extra enhancements, like the ability to view a diff between your local files and the server.

I still use Frak for Mythos and Banjo deployments.

[![fstrube/frak - GitHub](https://gh-card.dev/repos/fstrube/frak.svg?fullname)](https://github.com/fstrube/frak)
        </x-article>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
