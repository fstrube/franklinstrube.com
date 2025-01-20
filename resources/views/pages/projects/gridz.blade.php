@extends('layouts.default')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article title="Gridz">
After switching to Openbox as my preferred desktop environment, I quickly became tired of dragging and resizing windows with my mouse pointer. I missed the way Unity would let me snap a window to the left half of my screen by simple tapping a combo like `<Super> + Num 4`. So, I went ahead and hacked up a simple PyGTK app that does just that. It binds different keyboard shortcuts to some Python code that resizes and snaps windows to the edges of your screen.

[Check it out on GitHub](https://github.com/fstrube/gridz)
        </x-article>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
