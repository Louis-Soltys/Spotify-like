@if(!Request::ajax()) @extends('template.layout') @endif

@section("content")
<section class="body-container-explore">
    <div class="body-container__research">
        <div class="research__title">
            <h2>Recherche à propos de {{$search}}</h2>
            <p>20</p>
        </div>
        <div class="research__container">
            <div class="research__utilisateur">
                <div>
                    <h4>Utilisateurs</h4>
                    <h4 style="display:none">Utilisateurs</h4>
                </div>
                <div>
                @foreach ($user as $u)
                    <div class="research__utilisateur-container">
                        <div>
                            <p>01</p>
                            <img src="/css/img/photo-profil.jpg" alt="">
                            <h3><a href='/users/{{$u->id}}'>{{$u->name}}</a></h3>
                        </div>
                        @auth
                            @if(Auth::id() != $u->id)
                                @if(Auth::user()->ILikeThem->contains($u->id))
                                    <button href="/changeLike/{{$u->id}}" id='unfo'>Abonner</button>
                                @else
                                    <button href="/changeLike/{{$u->id}}" id='follow'>Désabonner</button>
                                @endif
                            @endif    
                        @endauth
                    </div>
                @endforeach
                </div>
            </div>
            <div class="research__songs">
                <div>
                    <h4>Musiques</h4>
                    <h4 style="display:none">Musiques</h4>
                </div>
                <div>
                    @foreach ($songs as $s)
                    <div class="research__songs-container">
                        <div>
                            <p>01</p>
                            <img src="/css/img/photo-profil.jpg" alt="">
                            <div>
                                <h3><a href='/users/{{$s->id}}'>{{$s->titre}}</h3>
                                <a href="/users/{{$s->user->id}}"> {{ $s->user->name }}</a> 
                            </div>
                        </div>
                        @auth
                            @if(Auth::user()->ILike->contains($s->id))
                                <a href="/changeSongLike/{{$s->id}}">Dislike
                            @else
                                <a href="/changeSongLike/{{$s->id}}">Like
                            @endif
                        @endauth
                        @guest
                            <a href="/login">Like</li>
                        @endguest
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection