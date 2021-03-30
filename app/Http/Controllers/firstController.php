<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Contenu;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Response;

class firstController extends Controller
{
    function index(){
        $s = Song::all();
        return view("firstController.index", ["song" => $s]);
    }

    function favorite(){
        $s = Song::all();
        return view("firstController.favorite", ["song" => $s]);
    }

    function createplaylist(){
        $s = Song::all();

        return view("firstController.create-playlist", ["song" => $s]);
    }

    function article($id){
        return view("firstController.article", ["id" => $id]);

    }

    function categories(){
        $s = Song::all();
        return view("firstController.categories", ["song" => $s]);
    }

    function abonnes(){
        $s = Song::all();
        return view("firstController.abonnes");
    }

    

    public function search($search){
        $users = User::whereRaw("name LIKE CONCAT(?, '%')", [$search])->orderBy('id', 'desc')->get();
        $songs = Song::whereRaw("titre LIKE CONCAT('%', ?, '%')", [$search])->orderBy('votes', 'desc')->get();

        return view("firstController.search", ["search" => $search, "user" => $users, "songs" => $songs]);
    }

    public function create(){
        return view("firstController.create");
    }

    public function store(Request $request){
        $request->validate([
            'titre' => 'required|min:4|max:255',
            'song' => 'required|file|mimes:mp3,ogg',
        ]);

        $song = new Song();
        $name= $request->file('song')->hashName();
        $request->file('song')->move("uploads/".Auth::id(), $name);
        $song->titre = $request->input('titre');
        $song->url = "/uploads/".Auth::id()."/".$name;
        $song->votes = 0;
        $song->user_id = Auth::id();
        $song->genre = $request->input('genre');
        $song->save();

        return back()->with('toastr', ["status"=>"success", "message"=>"Musique bien ajoutée !"]);
    }

    public function storeplaylist(Request $request){
        
        
        $playlist = new Playlist();
        $playlist->titre = $request->input('titre');
        $playlist->user_id = Auth::id();
        $playlist->save();

        $checkbox = $_POST['checkbox'];
        $n = count($checkbox);

        foreach($_POST['checkbox'] as $val){
            $contenu = new Contenu();
            $contenu->playlist_id = $playlist->id;
            $contenu->song_id = $val;
            $contenu->save();
        }
        return back();
    }


    public function render($id, $file) {
        $song = Song::find($id);
        $file = ".".$song->url;
        $test = File::get($file);
            $mime_type = "audio/mp3";

            $fileContents = File::get($file);
            return Response::make($fileContents, 200)
                        ->header('Accept-Ranges', 'bytes')
                        ->header('Content-Type', $mime_type)
                        ->header('Content-Length', filesize($file))
                        ->header('vary', 'Accept-Encoding');
        }



    public function user($id){
        $s = Song::all();
        $user = User::findOrFail($id);
        return view("firstController.user", ["user" => $user], ["song" => $s]);

    }

    public function changeLike($id){
        Auth::user()->ILikeThem()->toggle($id);
        return back();
    }

    public function changeSongLike($id){
        Auth::user()->ILike()->toggle($id);
        return back();
    }

    function genres(Request $genre){
        $s = Song::all();
        $genre = $genre->genre;
        return view("firstController.genres", ["song" => $s, "genre" => $genre]);
    }

}
