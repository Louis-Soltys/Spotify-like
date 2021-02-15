<ul>
@foreach($songs as $s)
    <li><a href ='#' data-file="{{ $s->url }}" class="song">{{ $s->titre }}</a> 
      Aimé par {{ $s->theyLike()->count() }} personnes
      uploadé par<a href="/users/{{$s->user->id}}"> {{ $s->user->name }}</a> 
      @auth
         @if(Auth::user()->ILike->contains($s->id))
            <a href="/changeSongLike/{{$s->id}}">Dislike</li>
         @else
            <a href="/changeSongLike/{{$s->id}}">Like</li>
         @endif
      @endauth
      @guest
         <a href="/login">Like</li>
      @endguest
     @endforeach
    </ul>