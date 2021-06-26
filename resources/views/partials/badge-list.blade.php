@forelse ($items as $item)
    <span class="badge badge rounded-pill bg-primary">{{ $item->label }}</span>
@empty
    <span>Nothing here ...</span>
@endforelse
