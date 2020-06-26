<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $posts = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->posts = $oldCart->posts;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($post, $id)
    {
        $storedPost = ['ownerName' => User::where('id','=',$post->owner_id)->pluck('name'), 'post' =>$post];
        $this->posts[$id] = $storedPost;
        $this->totalQty++;
        $this->totalPrice += $post->price;
    }

    public function remove($id)
    {
            $itemToRemove = $this->posts[$id];
            $this->totalPrice -= $itemToRemove['post']['price'];
            unset($this->posts[$id]);
            $this->totalQty--;

    }

}
