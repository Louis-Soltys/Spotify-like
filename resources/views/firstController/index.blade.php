@extends('template/layout')

@section('content')
    

<html>
    <body>

        <h1>Bienvenue sur la page d'accueil</h1>

        @include("partials._songs", ["songs" => $song])
    </body>


</html>
@endsection