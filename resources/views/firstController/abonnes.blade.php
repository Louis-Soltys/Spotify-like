@extends('template.layout')

@section('content')
<section class="body-container-explore">
    <div class="body-container__abonne">
        <div>
            <h2>Mes abonnés</h2>
            <p>2</p>
        </div>
        <div class="abonne-container">
            <div>
                <div>
                    <p>01</p>
                    <img src="/css/img/photo-profil.jpg" alt="">
                    <h3>Jean yves</h3>
                </div>
                <button>Désabonner</button>
            </div>
            <div>
                <div>
                    <p>02</p>
                    <img src="/css/img/photo-profil.jpg" alt="">
                    <h3>Sarah</h3>
                </div>
                <button>Abonner</button>
            </div>
        </div>
    </div>
</section>
@endsection