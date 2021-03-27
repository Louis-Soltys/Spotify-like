@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container__explore">
        <h2>Bienvenue sur Audify</h2>
        <span>Explore the sound</span>
        <div>
            <div class="explore__news">
                <h3>News</h3>
                <div></div>
            </div>
            <div class="explore__top-chart">
                <h3>Top charts</h3>
                <div class="top-chart__list">
                    @php
                        $nb = 0;
                    @endphp
                    @foreach($song as $s)
                        <div>
                            <div>
                                <p>01</p>
                                <div class="top-chart__list-img-album"></div>
                                <div>
                                    <h4><a href ='#' data-file="/render/{{ $s->id }}{{substr($s->url, 10)}}" data-nb='{{ $nb++}}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' data-like='{{ $s->id }}' class="song">{{ $s->titre }}</a></h4>
                                    <span><a href="/users/{{$s->user->id}}" class='user'> {{ $s->user->name }}</a></span>
                                </div>
                            </div>
                            <div>
                                <p>3:40</p>
                                <img src="/css/img/like.svg" alt="">
                                @auth
                                    @if(Auth::user()->ILike->contains($s->id))
                                        <a href="/changeSongLike/{{$s->id}}">Dislike</a>
                                    @else
                                        <a href="/changeSongLike/{{$s->id}}">Like</a>
                                    @endif
                                @endauth
                                @guest
                                    <a href="/login">Like</a></li>
                                @endguest
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection