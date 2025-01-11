<div class="grid">
    @if ($paginated)
    <x-pagination :paginator="$data"></x-pagination>
    @endif

    <table>
        <thead>
            {{ $headers }}
        </thead>
        <tbody>
            @foreach($data->items() as $item)
                {{ new Illuminate\Support\HtmlString(Blade::render($row->toHtml(), ['attributes' => $row->attributes, 'item' => $item])) }}
            @endforeach
        </tbody>
    </table>
    @if ($paginated)
    <x-pagination :paginator="$data"></x-pagination>
    @endif
</div>