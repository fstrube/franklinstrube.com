@extends('layouts.default')

@section('title', 'device-cmyk - CMYK Color Support for Modern Browsers')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article title="Frak" markdown>
`device-cmyk` is a browser polyfill that brings support for CMYK colors into your webpage. It's a simple script tag and your page magically supports `color: device-cmyk(1 0 0 0);` in your CSS.

```html
<script src="https://unpkg.com/device-cmyk@latest/dist/device-cmyk.polyfill.js"></script>

<style>
    body {
        background-color: device-cmyk(0 1 0 0); /* Magenta */
    }
</style>
```

[![fstrube/device-cmyk - GitHub](https://gh-card.dev/repos/fstrube/device-cmyk.svg?fullname)](https://github.com/fstrube/device-cmyk)
        </x-article>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
