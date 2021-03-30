@extends('template.layout')

@section('content')

    <div class="body-container__logo-title">
        <img src="/css/img/logo.png" alt="">
        <h2>Audify</h2>
    </div>
    <div class="body-container__form">
        <h3>S'inscrire</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <img src="/css/img/envelope.svg" alt="">
                <input id="name" type="text" placeholder="Pseudo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <img src="/css/img/envelope.svg" alt="">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <img src="/css/img/padlock.svg" alt="">
                <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <img src="/css/img/padlock.svg" alt="">
                <input id="password-confirm" type="password" placeholder="Confirmer mot de passe" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <p>Si vous posséder un compte <a href="{{ route('login') }}">Connectez-vous</a></p>
            <progress class="progress-bar-connexion" max="100" value="70"></progress>
            <button>S'inscrire</button>
        </form>
    </div>
@endsection