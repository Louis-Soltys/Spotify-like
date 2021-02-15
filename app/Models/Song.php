<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = "songs";

    public function user(){
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function theyLike(){
        return $this->belongsToMany("App\Models\User", "likesong", "song_id", "user_id");
    }
}
