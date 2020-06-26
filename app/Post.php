<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category' ,'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User','owner_id');
    }

    public function detailTransaction()
    {
        return $this->belongsTo('App\DetailTransaction','post_id');
    }
}
