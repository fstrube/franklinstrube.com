@extends('layouts.default')

@section('title', 'Scorecard')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article image="/images/pages/scorecard.png" title="Scorecard" markdown>
The Scorecard is a rubric for estimating the quality of a web project. The checklist calculates a score for your project, which helps to determine identify areas that need more attention.

The intended use of this list is to provide a quick way to assess the quality of a web project (without having to dive into code).

In a lot of ways it is like [“The Joel Test”](http://www.joelonsoftware.com/articles/fog0000000043.html){target=_blank}. In fact, some items in the list come directly from Joel’s. However, this list is more geared towards an individual project, whereas The Joel Test evaluates a team of developers.

You can see the Scorecard in action at [//scorecard.franklinstrube.com](//scorecard.franklinstrube.com){target=_blank} and also at [//github.com/fstrube/scorecard](//github.com/fstrube/scorecard){target=_blank}.
        </x-article>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
