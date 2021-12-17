<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nick', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relaciones 1:M

    // Un usuario puede tener muchas imagenes
    public function images() {
        return $this->hasMany('App\Image');
    }

    // Un usuario puede dejar muchos comentarios
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    // Un usuario puede dejar muchos likes
    public function likes() {
        return $this->hasMany('App\Like');
    }

}
