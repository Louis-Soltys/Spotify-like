@extends("template.layout")

@section("content")
    <h1>Recherche à porpos de {{$search}}</h1>

    <h4>Utilisateurs</h4>
    <ul>
    @foreach ($user as $u)
       <li><a href='/users/{{$u->id}}'>{{$u->name}}</a>
        @auth
            @if(Auth::id() != $user->id)
                @if(Auth::user()->ILikeThem->contains($user->id))
                    <a href="/changeLike/{{$user->id}}">Suivi</a>
                @else
                    <a href="/changeLike/{{$user->id}}">Suivre</a>
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
                <a href="/changeSongLike/{{$s->id}}">Like</li>
            @endif
        @endauth
    @endforeach
    </ul>
@endsection