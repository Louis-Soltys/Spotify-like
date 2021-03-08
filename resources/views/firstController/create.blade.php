@extends('template.layout')

@section('content')
    <h1>New Song</h1>
    
    @include("partials._errors")
    <form method='post' action="/songs" enctype="multipart/form-data" data-pjax>
        @csrf

        <input type='text' name='titre' placeholder="Le titre" value="{{old('title')}}" required/>
        <input type='file' name='song' placeholder="song" required/>
        <select name='genre' id='genre' required>
            <option value="Classical">Classical</option>
            <option value="Country">Country</option>
            <option value="Electronic dance music (EDM)">Electronic dance music (EDM)</option>
            <option value="Hip-hop">Hip-hop</option>
            <option value="Indie rock">Indie rock</option>
            <option value="Jazz">Jazz</option>
            <option value="K-pop">K-pop</option>
            <option value="Metal">Metal</option>
            <option value="Oldies">Oldies</option>
            <option value="Pop">Pop</option>
            <option value="Rap">Rap</option>
            <option value="Rhythm & blues (R&B)">Rhythm & blues (R&B)</option>
            <option value="Rock">Rock</option>
            <option value="Techno">Techno</option>
            <option value="frobeats">frobeats</option>
            <option value="Benga">Benga</option>
            <option value="Chimurenga">Chimurenga</option>
            <option value="Ethio-jazz">Ethio-jazz</option>
            <option value="Gnawa/ethno-pop/gwani blues">Gnawa/ethno-pop/gwani blues</option>
            <option value="Highlife">Highlife</option>
            <option value="Hiplife">Hiplife</option>
            <option value="Inkiranya">Inkiranya</option>
            <option value="Juju">Juju</option>
            <option value="Majika">Majika</option>
            <option value="Mbalax">Mbalax</option>
            <option value="Ndombolo">Ndombolo</option>
            <option value="Palm wine">Palm wine</option>
            <option value="Rababah">Rababah</option>
            <option value="Shaabi">Shaabi</option>
            <option value="Somali jazz">Somali jazz</option>
            <option value="Soukou/Congolese rumba">Soukou/Congolese rumba</option>
            <option value="Ubongo">Ubongo</option>
            <option value="Zilin">Zilin</option>
            <option value="Zouglou">Zouglou</option>
            <option value="Baila">Baila</option>
            <option value="Bollywood">Bollywood</option>
            <option value="Carnatic">Carnatic</option>
            <option value="Chinese folk">Chinese folk</option>
            <option value="Chinese traditional opera">Chinese traditional opera</option>
            <option value="C-pop">C-pop</option>
            <option value="Dangdut">Dangdut</option>
            <option value="Gagaku court music">Gagaku court music</option>
            <option value="Goa trance">Goa trance</option>
            <option value="Hindustani">Hindustani</option>
            <option value="Japanese folk">Japanese folk</option>
            <option value="J-pop">J-pop</option>
            <option value="K-trot">K-trot</option>
            <option value="Punjabi">Punjabi</option>
            <option value="Rafi">Rafi</option>
            <option value="Raga rock">Raga rock</option>
            <option value="V-pop">V-pop</option>
            <option value="Calypso">Calypso</option>
            <option value="Dancehall">Dancehall</option>
            <option value="Mambo">Mambo</option>
            <option value="Mento">Mento</option>
            <option value="Merengue">Merengue</option>
            <option value="Reggae">Reggae</option>
            <option value="Rocksteady">Rocksteady</option>
            <option value="Salsa">Salsa</option>
            <option value="Ska">Ska</option>
            <option value="Soca">Soca</option>
            <option value="Steel band music/pan music">Steel band music/pan music</option>
            <option value="Zouk">Zouk</option>
            <option value="A capella">A capella</option>
            <option value="Celtic chant">Celtic chant</option>
            <option value="Drum & bass">Drum & bass</option>
            <option value="Euro-disco">Euro-disco</option>
            <option value="Flamenco">Flamenco</option>
            <option value="Glitch pop">Glitch pop</option>
            <option value="Grime">Grime</option>
            <option value="Opera">Opera</option>
            <option value="Polka">Polka</option>
            <option value="Trance">Trance</option>
            <option value="Bachata">Bachata</option>
            <option value="Balada">Balada</option>
            <option value="Bossa nova">Bossa nova</option>
            <option value="Compas">Compas</option>
            <option value="Cumbia">Cumbia</option>
            <option value="Mariachi">Mariachi</option>
            <option value="Mexican">Mexican</option>
            <option value="Mesitzo">Mesitzo</option>
            <option value="Ranchera">Ranchera</option>
            <option value="Reggaeton">Reggaeton</option>
            <option value="Samba">Samba</option>
            <option value="Tango">Tango</option>
            <option value="Vallenatto">Vallenatto</option>
            <option value="American folk">American folk</option>
            <option value="Bluegrass">Bluegrass</option>
            <option value="Blues">Blues</option>
            <option value="Canadian folk">Canadian folk</option>
            <option value="Gospel">Gospel</option>
            <option value="Industrial">Industrial</option>
            <option value="Swing">Swing</option>
            <option value="Tejano">Tejano</option>
            <option value="Zydeco">Zydeco</option>
          </select>
        <input type='submit'>
    </form>
@endsection