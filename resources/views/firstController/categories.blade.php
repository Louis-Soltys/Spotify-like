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
    <div class="body-container__categories">
        <div class="categories__playlist-container">
            <div>
                <h2>Mes playlists</h2>
                <p>12</p>
            </div>
            <div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
                <div>
                    <img src="./img/Order-in-decline.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="categories__category-container">
            <div>
                <h2>Catégories</h2>
                <p>200</p>
            </div>
            <div>
                @php
                    $test = [];
                @endphp
                @foreach ($song as $s)
                    @if (!in_array($s->genre, $test))
                        <div>
                            <a href="/genre/{{$s->genre}}" ><img src="./img/Order-in-decline.jpg" alt="">
                            @php
                                echo $s->genre;
                                $test[] = $s->genre;
                            @endphp
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection