@extends("template.layout")

@section("content")
    <h1>Recherche à porpos de {{$search}}</h1>

    <h4>Utilisateurs</h4>
    <ul>
    @foreach ($user as $u)
       <li><a href='/users/{{$u->id}}'>{{$u->name}}</a></li>
    @endforeach
    </ul>
    <h4>Chansons</h4>
    <ul>
    @foreach ($songs as $s)
        <li><a href='/users/{{$s->id}}'>{{$s->titre}}</a></li>
    @endforeach
    </ul>
@endsection