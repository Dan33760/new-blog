@extends('layouts.visitor')

@section('content')
    
    <!-- Section -->
    <div class="body">
        <main class="main">
            <div class="container">
                @foreach ($posts as $item)
                    <article class="article">
                        <a href="#" class="article-img"><img src="{{ Storage::url($item->image) }}" alt=""></a>
                        <div class="article-date">Publie le {{ $item->created_at }}</div>
                        <h2 class="article-title"><a href="#">{{ $item->titre }}</a></h2>
                        <p>{{ $item->contenu }}</p>
                        <a href="{{ route('detail', $item->id) }}" class="plus">Lire Plus ...</a>
                    </article>
                @endforeach
            </div>
        </main>
        {{-- asside --}}
        @include('asside')
    </div>

@endsection