<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'user_id', 'image_path', 'description',
    ];

    // Relaciones 1:M

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
