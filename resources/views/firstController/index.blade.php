@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container-explore__menu">
        <div>
            <img src="/css/img/loupe.svg" alt="">
            <input type="text" placeholder="Search">
        </div>
        <div>
            <div></div>
            <a href="users/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
        </div>
    </div>
    @include("partials._songs")
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
                    <div>
                        <div>
                            <p>01</p>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <h4>War</h4>
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
                            <p>01</p>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <h4>War</h4>
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
                            <p>01</p>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <h4>War</h4>
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
                            <p>01</p>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <h4>War</h4>
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
                            <p>01</p>
                            <div class="top-chart__list-img-album"></div>
                            <div>
                                <h4>War</h4>
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