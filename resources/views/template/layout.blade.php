
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <ul>
            <li><a href='/' id='index' class='ajax-request-index'>Index</a></li>
            <li><a href='/favorite' id='fav' class='ajax-request'>Favoris</a></li>
            <li><form method="get" action="/search" id='search'>
                <input type='text' name='search' placeholder="Cherchez une chanson ou un utilisateur" required>
                <input type="submit" value='chercher' name='submit-search' id='btn-search'>
            </form></li>
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
            <li><a href='/songs/create' id="create" class='ajax-request'>NEw</a></li>
            <li>
                <a>
                    {{ Auth::user()->name }}
                </a>

                <div>
                    <a class='ajax-request' href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        </ul>
        <div id="player">
            <button id='previous'><<</button>
            <audio controls id="audio"></audio>
            <button id='next'>>></button>
            <label>Aléatoire</label>
            <input type="checkbox" id='random' name='checkbox'>

        </div>

    </header>
    <div id='pjax-container'>
        @yield('content')
    </div>
</body>

<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.pjax.js"></script>
<script src="/js/divers.js"></script>

</html>
