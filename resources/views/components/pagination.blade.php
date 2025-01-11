<div class="pagination">
    @foreach($paginator->linkCollection() as $link)
    @if ($link['url'] || $loop->first || $loop->last)
    <a 
        href="{{ $link['url'] ?? 'javascript:void' }}" 
        @if($link['active'])
        data-active
        @endif
        @disabled(!$link['url'])
        >{{ new Illuminate\Support\HtmlString($link['label']) }}</a>
    @else
    <span>{{ new Illuminate\Support\HtmlString($link['label']) }}</span>
    @endif
    @endforeach
</div>