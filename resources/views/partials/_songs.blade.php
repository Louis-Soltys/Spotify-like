<ul>
@foreach($songs as $s)
    <li><a href ='#' data-file="{{ $s->url }}" class="song">{{ $s->titre }}</a> Aimé par {{ $s->votes }} personnes
    uploadé par <a href="/users/{{$s->user->id}}"> {{ $s->user->name }}</a></li>
 @endforeach
    </ul>