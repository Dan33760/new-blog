<aside class="sidebar">
    <h4 class="sidebar-title">Categories</h4>
    <ul>
        <li><a href="/">All</a></li>
        @foreach ($categories as $item)
            <li><a href="/?id={{$item->id}}">{{ $item->nom }}</a></li>
        @endforeach
    </ul>
    <hr>
    {{-- <h4 class="sidebar-title">Author</h4>
    <ul>
        @dd($auteurs)
        @foreach ($auteurs as $item)
            <li><a href="#">{{ $item->nom .' '. $item['last_name'] }}</a></li>
        @endforeach
    </ul> --}}
</aside>