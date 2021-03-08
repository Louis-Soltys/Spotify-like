
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/toastr.css" rel="stylesheet">
</head>

<body>
    <section class="main-menu-container">
        <div class="main-menu-container__logo-title">
            <img src="/css/img/logo.png" alt="">
            <h2>Audify</h2>
        </div>
        <div class="main-menu-container__menu">
            <div>
                <h3>Menu</h3>
                <nav>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Explore</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Discover</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Favoris</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Abonnés</a>
                    </div>
                </nav>
            </div>
            <div>
                <h3>Playlist</h3>
                <nav>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Create playlist</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="">Relax</a>
                    </div>
                </nav>
            </div>
            <div>
                <h3>Account</h3>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link ajax-request" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                
                    @if (Route::has('register'))
                        <li>
                            <a class='ajax-request' href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <nav>
                        <div>
                            <img class="earth" src="/css/img/earth.svg" alt="">
                            <a>{{ Auth::user()->name }}</a>
                        </div>
    
                        <div>
                            <img class="earth" src="/css/img/earth.svg" alt="">
                            <a class='ajax-request' href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                        </div>
                    </nav>
                @endguest
            </div>
        </div>
        <div class="main-menu-container__switch-mode">
            <label class="switch">
                <input type="checkbox" class="switch__checkbox" />
                <div class=""></div>
            </label>
            <div>
                <p>Light</p>
                <p>Dark</p>
            </div>
        </div>
    </section>
        
    <section class="body-container">
        <div id='pjax-container'>
            @yield('content')
        </div>
        @auth
        <div class="body-container__play-music">
            <div>
                <img src="/css/img/fast-music.svg" id='previous' alt="">
                <div><img src="/css/img/play-lecteur.svg" id='audio' alt=""></div>
                <img src="/css/img/fast-music.svg" id='next' alt="">
            </div>
            <div>
                <p>Turning Away | SUM41</p>
                <audio controls id="audio"></audio>
            </div>
            <img src="/css/img/like.svg" alt="">
        </div>
        @endauth
        @if(Session::has("toastr"))
            <script>
                toastr.{{Session::get('toastr')['status']}}('{{Session::get("toastr")["message"]}}')
            </script>
        @endif
    </section>
</body>

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.pjax.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/divers.js"></script>

</html>
