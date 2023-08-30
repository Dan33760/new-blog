@extends('layouts.visitor')

@section('content')
    
    <div class="body">
        <main class="main">
            <div class="container">
                <h2>{{ $post->titre }}</h2>
                <div class="article-date"> Publie le {{ $post->created_at }}</div>

                <p> </p>
                
                <blockquote> {{ $post->contenu }} </blockquote>
                
            </div>
            <br> <br>
            <div>
                <form action="{{ route('add-comment', $post->id) }}" method="POST">
                    @csrf
                    <div>
                        <label for="">Nom</label>
                        <input type="text" name="nom">
                        @error('nom')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="">Commentaire</label>
                        <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                        @error('commentaire')
                            {{$message}}
                        @enderror
                    </div>
                    <input type="submit" value="Commenter">
                </form>
            </div>
        </main>
        <aside class="sidebar">
            {{-- @dd($post->visiteurs) --}}
            @foreach ($post->visiteurs as $item)
                <article class="article">
                    {{-- <div class="article-date">Publie le {{ $item->pivot-> }}</div> --}}
                    <h2 class="article-title"><a href="#">{{ $item->nom }}</a></h2>
                    <p>{{ $item->pivot->contenu }}</p>
                    {{-- <a href="{{ route('detail', $item->id) }}" class="plus">Lire Plus ...</a> --}}
                </article>
            @endforeach
        </aside>

    </div>
    <!-- Section -->
    

@endsection
