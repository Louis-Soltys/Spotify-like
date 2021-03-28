@extends('template.layout')

@section('content')

    <h1>Crée ta playlist</h1>
   
    <form method='post' action="/songs" enctype="multipart/form-data" data-pjax>
        @csrf

        <input type='text' name='name' placeholder="Titre de la playlist" value="{{old('title')}}" required/>
        
        
        @php
        $nb = 0;
        @endphp
        @foreach($song as $s)
            @auth
                <input type= "checkbox" data-id="{{ $s->id }}" name="" value="{{ $s->titre }}"> {{ $s->titre }} 
            @endauth     
        @endforeach
          </select>
        <button type="submit">Terminer</button>
    </form>

@endsection