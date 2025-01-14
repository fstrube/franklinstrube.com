<div class="pagination">
    <div class="hide-on-mobile">
        @foreach($paginator->linkCollection() as $link)
        @if ($link['url'] || $loop->first || $loop->last)
        <x-pagination-link :link="$link" />
        @else
        <span>{{ new Illuminate\Support\HtmlString($link['label']) }}</span>
        @endif
        @endforeach
    </div>
    <div class="hide-on-tablet">
        <x-pagination-link :link="$paginator->linkCollection()->first()" />
        <select data-action="goto-page">
            @foreach(range(1, $paginator->lastPage()) as $page)
            <option @selected($page === $paginator->currentPage()) value="{{ $paginator->url($page) }}">{{ $page }}</option>
            @endforeach
        </select>
        <x-pagination-link :link="$paginator->linkCollection()->last()" />
    </div>
</div>
