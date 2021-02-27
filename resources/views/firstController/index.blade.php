@if (!Request::ajax())
    @include('template.layout')
@endif
    <section id="container">
        <h1>Bienvenue sur la page d'accueil</h1>
        @include("partials._songs", ["songs" => $song])
    </section>
