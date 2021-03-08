<ul>
@php
$nb = 0;
@endphp
@foreach($songs as $s)
    <li><a href ='#' data-file="{{ $s->url }}" data-nb='{{ $nb++}}' class="song">{{ $s->titre }}</a> 
      Aimé par {{ $s->theyLike()->count() }} personnes
         uploadé par<a href="/users/{{$s->user->id}}" class='user ajax-request'> {{ $s->user->name }}</a> 
      @auth
         @if(Auth::user()->ILike->contains($s->id))
            <a href="/changeSongLike/{{$s->id}}" class="ajax-request">Dislike</a>
         @else
            <a href="/changeSongLike/{{$s->id}}" class="ajax-request">Like</a>
         @endif
      @endauth
      @guest
         <a href="/login" class="ajax-request">Like</a></li>
      @endguest
     @endforeach
    </ul>