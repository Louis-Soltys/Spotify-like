@php
$nb = 0;
@endphp

<section class="categorie__genre-music">
   <div class="genre-music__list-music">
      <h3>{{$playlist}}</h3>
      @foreach($playlistContent as $s)
            <div>
               <div>
                  <img src="/css/img/Order-in-decline.jpg" alt="">
                  <div>
                     <h3><a href ='#' data-file="/render/{{ $s->id }}{{substr($s->url, 10)}}" data-nb='{{ $nb++}}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' data-like='{{ $s->id }}' class="song">{{ $s->titre }}</a></h3>
                     <span><a href="/users/{{$s->user->id}}" class='user'> {{ $s->user->name }}</a></span>
                  </div>
               </div>
               Aimé par {{ $s->theyLike()->count() }} personnes
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
</section>

   