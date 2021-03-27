@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container__explore">
        <div class="profil-img-follower">
            <img src="/css/img/photo-profil.jpg" alt="">
            <div class="profil-followers_container">
                <div>
                    <div>
                        <span>{{$user->songs()->count()}}</span>
                        <span>Musiques</span>
                    </div>
                    <div>
                        <span>{{$user->TheyLikeMe()->count()}}</span>
                        <span>Abonnés</span>
                    </div>
                    <div>
                        <span>{{$user->ILikeThem()->count()}}</span>
                        <span>Abonnements</span>
                    </div>
                </div>
                <div>
                    @auth
                        @if(Auth::id() != $user->id)
                            @if(Auth::user()->ILikeThem->contains($user->id))
                                <p>Tu es abonné à {{ $user->name }}</p>
                                <a href="/changeLike/{{$user->id}}" id='follow'>Désabonner</a>
                            @else
                                <p>Tu n'es pas abonné à {{ $user->name }}</p>
                                <a href="/changeLike/{{$user->id}}" id='unfo'>Abonner</a>
                            @endif
                        @endif    
                    @endauth
                </div>
            </div>
        </div>
        <div class="profil-music-informations">
            <div class="profil-informations_container">
                <h2>{{ $user->name }}</h2>
                @auth
                    @if(Auth::id() == $user->id)
                        @include("partials._add-song")
                    @endif   
                @endauth
            </div>
            <div class="profil-music_container">
                @auth
                    @if(Auth::id() == $user->id)
                        <h2>Mes musiques importées</h2>
                    @else
                        <h2>Les musiques de {{ $user->name }}</h2>   
                    @endif
                @endauth
                <div class="profil-import-music_container">
                    @auth
                        @php
                            $nb = 0;
                        @endphp
                        @foreach($song as $s)
                            @if($user->id == $s->user->id )
                                <div>
                                    <div>
                                        <p>{{$s->id}}</p>
                                        <div class="top-chart__list-img-album"></div>
                                        <div>
                                            <h4><a href ='#' data-file="/render/{{ $s->id }}{{substr($s->url, 10)}}" data-nb='{{ $nb++}}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' data-like='{{ $s->id }}' class="song">{{ $s->titre }}</a></h4>
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
                            @endif   
                        @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

@endsection