@if(!Request::ajax()) @extends('template.layout') @endif

@section('content')
    <h1>Bienvenue sur la page d'accueil</h1>
    @include("partials._songs", ["songs" => $song])
@endsection