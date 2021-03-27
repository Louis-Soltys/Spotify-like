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
                        <span>{{$user->TheyLikeMe()->count()}} </span>
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
                    <div>
                        <div>
                            <span>01</span>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <span>WAR</span>
                                <span>Sum41</span>
                            </div>
                        </div>
                        <div>
                            <p>3:40</p>
                            <div><img src="/css/img/play.svg" alt=""></div>
                            <img src="/css/img/like.svg" alt="">
                        </div>
                    </div>
                    <div>
                        <div>
                            <span>02</span>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <span>WAR</span>
                                <span>Sum41</span>
                            </div>
                        </div>
                        <div>
                            <p>3:40</p>
                            <div><img src="/css/img/play.svg" alt=""></div>
                            <img src="/css/img/like.svg" alt="">
                        </div>
                    </div>
                    <div>
                        <div>
                            <span>03</span>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <span>WAR</span>
                                <span>Sum41</span>
                            </div>
                        </div>
                        <div>
                            <p>3:40</p>
                            <div><img src="/css/img/play.svg" alt=""></div>
                            <img src="/css/img/like.svg" alt="">
                        </div>
                    </div>
                    <div>
                        <div>
                            <span>04</span>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <span>WAR</span>
                                <span>Sum41</span>
                            </div>
                        </div>
                        <div>
                            <p>3:40</p>
                            <div><img src="/css/img/play.svg" alt=""></div>
                            <img src="/css/img/like.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    
@endsection