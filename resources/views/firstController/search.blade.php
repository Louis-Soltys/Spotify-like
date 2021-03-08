@if(!Request::ajax()) @extends('template.layout') @endif

@section("content")
    <h1>Recherche à porpos de {{$search}}</h1>

    <h4>Utilisateurs</h4>
    <ul>
    @foreach ($user as $u)
       <li><a href='/users/{{$u->id}}'>{{$u->name}}</a>
        @auth
            @if(Auth::id() != $u->id)
                @if(Auth::user()->ILikeThem->contains($u->id))
                    <a href="/changeLike/{{$u->id}}">Suivi</a>
                @else
                    <a href="/changeLike/{{$u->id}}">Suivre</a>
                @endif
            @endif    
        @endauth
    </li>
    @endforeach
    </ul>
    <h4>Chansons</h4>
    <ul>
    @foreach ($songs as $s)
        <li><a href='/users/{{$s->id}}'>{{$s->titre}}</a>
        Aimé par {{ $s->theyLike()->count() }} personnes
        uploadé par<a href="/users/{{$s->user->id}}"> {{ $s->user->name }}</a> 
        @auth
         @if(Auth::user()->ILike->contains($s->id))
            <a href="/changeSongLike/{{$s->id}}">Dislike
         @else
            <a href="/changeSongLike/{{$s->id}}">Like
         @endif
      @endauth
      @guest
         <a href="/login">Like</li>
      @endguest
    @endforeach
    </ul>
@endsection