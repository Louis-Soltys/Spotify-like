<ul>
@php
$nb = 0;
@endphp

   @foreach($song as $s)
      @if($s->genre == $genre)

    <li><a href ='#' data-file="/render/{{ $s->id }}{{substr($s->url, 10)}}" data-nb='{{ $nb++}}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' data-like='{{ $s->id }}' class="song">{{ $s->titre }}</a> 
      Aimé par {{ $s->theyLike()->count() }} personnes
         uploadé par<a href="/users/{{$s->user->id}}" class='user'> {{ $s->user->name }}</a> 
      @auth
         @if(Auth::user()->ILike->contains($s->id))
            <a href="/changeSongLike/{{$s->id}}">Dislike</a>
         @else
            <a href="/changeSongLike/{{$s->id}}">Like</a>
         @endif
      @endauth
      @guest
         <a href="/login">Like</a></li>
      @endguest
      @endif

   @endforeach
    </ul>