<div class="callout callout-{{ $type ?? 'aside' }}">
    <h2 class="callout-title">{{ $title }}</h2>
    {{ $slot }}
    <a class="more" title="{{ $title }}" href="{{ $url }}" target="_blank">Read More</a>
    <time datetime="{{ Carbon\Carbon::parse($published)->format('c')}}">{{ Carbon\Carbon::parse($published)->format('l, F j, Y') }}</time>
</div>
