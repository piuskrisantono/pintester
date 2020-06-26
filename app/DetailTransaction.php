<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function post()
    {
        return $this->hasMany('App\Post', 'id', 'post_id');
    }

    public function transaction()
    {
        return $this->belongsTo('Transaction','transaction_id');
    }
}
