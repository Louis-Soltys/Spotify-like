@extends('template.layout')

@section('content')

    <h1>Playlist à partir de vos musiques favorites</h1>

    <ul>
        @php
        $nb = 0;
        @endphp
        @foreach($song as $s)
              @auth
                 @if(Auth::user()->ILike->contains($s->id))
                 <li><a href ='#' data-file="{{ $s->url }}" data-nb='{{ $nb++ }}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' class="song">{{ $s->titre }}</a> 
                    Aimé par {{ $s->theyLike()->count() }} personnes
                       uploadé par<a href="/users/{{$s->user->id}}" class='user ajax-request'> {{ $s->user->name }}</a> 
                    <a href="/changeSongLike/{{$s->id}}" class="ajax-request">Dislike</a>
                 @endif
              @endauth
              @guest
                 <a href="/login" class="ajax-request">Like</a></li>
              @endguest
        @endforeach
    </ul>

@endsection