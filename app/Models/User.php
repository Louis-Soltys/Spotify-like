<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function songs(){
        return $this->hasMany("App\Models\Song", "user_id");
    }

    public function ILikeThem(){
        return $this->belongsToMany("App\Models\User", "connection", "from_id", "to_id");
    }

    public function TheyLikeMe(){
        return $this->belongsToMany("App\Models\User", "connection", "to_id", "from_id");
    }

    public function ILike(){
        return $this->belongsToMany("App\Models\User", "likesong", "user_id", "song_id");
    }
}
