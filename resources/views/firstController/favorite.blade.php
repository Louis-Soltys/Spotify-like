@extends('template.layout')

@section('content')
{{-- <section class="body-container-explore">
   <div class="body-container__favorite">
       <div>
           <h2>Mes musiques favorites</h2>
           <p>20</p>
       </div>
       <div class="favorite-container">
           <div>
               <div>
                   <p>01</p>
                   <img src="/css/img/Order-in-decline.jpg" alt="">
                   <div>
                       <h3>War</h3>
                       <p>Sum41</p>
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
                  <img src="/css/img/Order-in-decline.jpg" alt="">
                  <div>
                     <h3>War</h3>
                     <p>Sum41</p>
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
</section> --}}

    <ul>
        @php
        $nb = 0;
        @endphp
        @foreach($song as $s)
              @auth
                 @if(Auth::user()->ILike->contains($s->id))
                 <li><a href ='#' data-file="{{ $s->url }}" data-nb='{{ $nb++ }}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' class="song">{{ $s->titre }}</a> 
                    Aimé par {{ $s->theyLike()->count() }} personnes
                       uploadé par<a href="/users/{{$s->user->id}}" class='user ajax-request'> {{ $s->user->name }}</a> 
                    <a href="/changeSongLike/{{$s->id}}" class="ajax-request">Dislike</a>
                 @endif
              @endauth
              @guest
                 <a href="/login" class="ajax-request">Like</a></li>
              @endguest
        @endforeach
    </ul>

@endsection