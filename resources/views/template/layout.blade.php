
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
            <li><a href='/' id='index'>Index</a></li>
            <li><a href='/favorite' id='fav'>Favoris</a></li>
            <li><form method="get" action="/search" id='search'>
                <input type='text' name='search' placeholder="Cherchez une chanson ou un utilisateur">
                <input type="submit" value='chercher' name='submit-search'>
            </form></li>
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
            <li><a href='/songs/create' id="create">NEw</a></li>
            <li>
                <a>
                    {{ Auth::user()->name }}
                </a>

                <div>
                    <a href="{{ route('logout') }}"
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

    @section('content')
        
    @show

</body>

<script src="/js/jquery.min.js"></script>
<script src="/js/divers.js"></script>

</html>
