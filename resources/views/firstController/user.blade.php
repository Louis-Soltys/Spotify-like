@extends('template/layout')

@section('content')
    <h1>Bienvenue chez {{ $user->name }} </h1>

    <h3>Quelques infos</h3>

    Propriétaire de {{$user->songs()->count()}} chanson(s)

    <br/>
        Suivi par {{$user->TheyLikeMe()->count()}} personnes et il suit {{$user->ILikeThem()->count()}} personnes
    <br/>

    @auth
        @if(Auth::id() != $user->id)
            @if(Auth::user()->ILikeThem->contains($user->id))
                <a href="/changeLike/{{$user->id}}">Suivi</a>
            @else
                <a href="/changeLike/{{$user->id}}">Suivre</a>
            @endif
        @endif    
    @endauth

    <h3>Mes chansons</h3>
    @include("partials._songs", ["songs" => $user->songs])

@endsection