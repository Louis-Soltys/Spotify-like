@extends('template.layout')

@section('content')
<div class="body-container__logo-title">
    <img src="/css/img/logo.png" alt="">
    <h2>Audify</h2>
</div>
<div class="body-container__form">
    <h3>Se connecter</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <img src="/css/img/envelope.svg" alt="">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <img src="/css/img/padlock.svg" alt="">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <p>Si vous ne posséder pas de compte <a href="{{ route('register') }}">Inscrivez-vous</a></p>
        <progress class="progress-bar-connexion" max="100" value="70"></progress>
        <button>Connexion</button>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>

@endsection