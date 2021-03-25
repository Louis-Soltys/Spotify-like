
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
                        <a href="/">Accueil</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="/categories">Catégories</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="/favorite">Favoris</a>
                    </div>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="/abonnes">Abonnés</a>
                    </div>
                </nav>
            </div>
            <div>
                <h3>Playlist</h3>
                <nav>
                    <div>
                        <img class="earth" src="/css/img/earth.svg" alt="">
                        <a href="/create-playlist">Create playlist</a>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <nav>
                        <div>
                            <img class="earth" src="/css/img/earth.svg" alt="">
                            <a href="/users/{{Auth::user()->id}}">{{ Auth::user()->name }}</a>
                        </div>
    
                        <div>
                            <img class="earth" src="/css/img/earth.svg" alt="">
                            <a href="{{ route('logout') }}"
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
        
     <section class="body-container" id='pjax-container'> {{-- ajouter une div contenant l'id "pjax-container" --}}
        @yield('content')
        @auth
         </div>
        <div class="body-container__play-music">
            <div>
                <img src="/css/img/fast-music.svg" id='previous' alt="">
                <div id='play-btn'><img src="/css/img/play-lecteur.svg" id='play' alt=""></div>
                <img src="/css/img/fast-music.svg" id='next' alt="">
            </div>
            <div>
                <p id='title'></p>
                <p id='artist'></p>
                <audio id="audio"></audio>
                <p id='duration'></p>
                <p id='currentTime'></p>
                volume
                <input type="range" id="vol" max="1" min="0" step="0.01" onchange="changevolume(this.value)" />
                <div class="buffered">
                    <span id="buffered-amount"></span>
                  </div>
                  <div class="progress">
                    <span id="progress-amount"></span>
                  </div>
                </div>
            <a href="#" id='like-btn'><img src="/css/img/like.svg" alt="">like</a>
            <label>Aléatoire (à enlever quand on aura le logo) ---></label>
            <input type='checkbox' name='checkbox' id='random'>
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
