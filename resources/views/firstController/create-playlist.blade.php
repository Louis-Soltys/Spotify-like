@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container__playlist">
        <div class="playlist__listen-playlist">

        </div>
        <div class="playlist__create-playlist">
        <form method='post' action="/playlist" enctype="multipart/form-data" data-pjax>
        @csrf
            <div>
                <h2>Créer ta playlist</h2>
                <input type="text" name="titre" placeholder="Nom de ta playlist">
            </div>
            <div class="create-playlist__container">
            @php
            $nb = 1;
            @endphp
            @foreach($song as $s)
                <div>
                    <div>
                        <p>{{$nb++}}</p>
                        <img src="/css/img/Order-in-decline.jpg" alt="">
                        <div>
                            <h4><a href ='#' data-file="/render/{{ $s->id }}{{substr($s->url, 10)}}"  data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' data-like='{{ $s->id }}' class="song">{{ $s->titre }}</a></h4>
                            <span><a href="/users/{{$s->user->id}}" class='user'> {{ $s->user->name }}</a></span>
                        </div>
                    </div>
                    <div>
                        <img src="/css/img/like.svg" alt="">
                        <input type="checkbox" name="checkbox[]" value="{{ $s->id }}">
                    </div>
                </div>

            @endforeach
            <button type="submit">Valider</button>
            </form>
               
        </div>
    </div>
</section>

@endsection