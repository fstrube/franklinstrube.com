<a
    href="{{ $link['url'] ?? 'javascript:void' }}"
    @if($link['active'] ?? false)
    data-active
    @endif
    @disabled(!($link['url'] ?? null))
    >{{ new Illuminate\Support\HtmlString($link['label'] ?? '') }}</a>
