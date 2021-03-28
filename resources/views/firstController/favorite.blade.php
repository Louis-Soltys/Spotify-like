@extends('template.layout')

@section('content')
<section class="body-container-explore">
   <div class="body-container__favorite">
       <div>
           <h2>Mes musiques favorites</h2>
           <p>{{Auth::user()->ILike->count()}}</p>
       </div>
       <div class="favorite-container">
            @php
            $nb = 0;
            @endphp
            @foreach($song as $s)
                @auth
                    @if(Auth::user()->ILike->contains($s->id))
                        <div>
                            <div>
                                <p>{{$s->id}}</p>
                                <img src="/css/img/Order-in-decline.jpg" alt="">
                                <div>
                                    <h3><a href ='#' data-file="{{ $s->url }}" data-nb='{{ $nb++ }}' data-title='{{ $s->titre }}' data-artist='{{ $s->user->name }}' class="song">{{ $s->titre }}</a></h3>
                                    <p><a href="/users/{{$s->user->id}}" class='user ajax-request'> {{ $s->user->name }}</a></p>
                                </div>
                            </div>
                            <div>
                                <p>3:40</p>
                                <img src="/css/img/like.svg" alt="">
                                <a href="/changeSongLike/{{$s->id}}" class="ajax-request">Dislike</a>
                            </div>
                        </div>
                    @endif
                @endauth
                @guest
                    <a href="/login" class="ajax-request">Like</a>
                @endguest         
            @endforeach
       </div>
   </div>
</section> 


        


@endsection