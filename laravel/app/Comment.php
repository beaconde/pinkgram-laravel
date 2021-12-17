<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'image_id', 'content',
    ];

    public function image() {
        return $this->belongsTo('\App\Image');
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }

}
