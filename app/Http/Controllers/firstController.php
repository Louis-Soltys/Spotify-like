<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class firstController extends Controller
{
    function index(){
        $s = Song::all();

        return view("firstController.index", ["song" => $s]);

    }

    function about(){
        return view("firstController.about");
    }

    function article($id){

    return view("firstController.article", ["id" => $id]);

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
            'song' => 'required|file|mimes:mp3,ogg'
        ]);


        $song = new Song();
        $name= $request->file('song')->hashName();
        $request->file('song')->move("uploads/".Auth::id(), $name);
        $song->titre = $request->input('titre');
        $song->url = "/uploads/".Auth::id()."/".$name;
        $song->votes = 0;
        $song->user_id = Auth::id();
        $song->save();

        return redirect("/");
    }

    public function user($id){

        $user = User::findOrFail($id);
        return view("firstController.user", ["user" => $user]);

    }

    public function changeLike($id){
        Auth::user()->ILikeThem()->toggle($id);
        return back();
    }

    public function changeSongLike($id){
        Auth::user()->ILike()->toggle($id);
        return back();
    }
}
