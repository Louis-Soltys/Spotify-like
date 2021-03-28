@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container__playlist">
        <div class="playlist__listen-playlist">

        </div>
        <div class="playlist__create-playlist">
            <div>
                <h2>Créer ta playlist d'après tes favoris</h2>
                <input type="text" placeholder="Nom de ta playlist">
            </div>
            <div class="create-playlist__container">
                <div>
                    <div>
                        <p>01</p>
                        <img src="/css/img/Order-in-decline.jpg" alt="">
                        <div>
                            <h4>War</h4>
                            <span>Sum41</span>
                        </div>
                    </div>
                    <div>
                        <img src="/css/img/like.svg" alt="">
                        <input type="checkbox">
                    </div>
                </div>
                <div>
                    <div>
                        <p>02</p>
                        <img src="/css/img/Order-in-decline.jpg" alt="">
                        <div>
                            <h4>War</h4>
                            <span>Sum41</span>
                        </div>
                    </div>
                    <div>
                        <img src="/css/img/like.svg" alt="">
                        <input type="checkbox">
                    </div>
                </div>
            </div>
            <form action="">
                <button type="submit">Valider</button>
            </form>
        </div>
    </div>
</section>

@endsection