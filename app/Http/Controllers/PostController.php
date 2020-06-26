<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\FollowedCategory;
use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followedPost($id)
    {
        $followed = FollowedCategory::where('user_id', '=', $id)->pluck('category_id')->toArray();
        $posts = Post::with('category')->paginate(10);
        return view('followedPost', compact('followed','posts'));
    }

    public function myPost($id)
    {
        $posts = Post::where('owner_id', '=',$id)->with('category')->paginate(10);
        return view('myPost', compact('posts'));
    }

    public function categoryPost()
    {
        $categories = Category::all();
        return view('addPost', compact('categories'));
    }

    public function doAddPost(Request $request)
    {


        $validator = Validator::make($request->all(),
            [
                'title' => 'required|min:20|max:200',
                'caption' => 'required',
                'image' => 'required|mimes:jpeg,png,gif',
                'price' => 'required|integer',
                'category_id' => 'required'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        if($request->hasFile('image')){
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move('Aset/', $filename);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->image = $filename;
        $post->price = $request->price;
        $post->category_id = $request->category_id;
        $post->owner_id = $request->owner_id;
        $post->save();
        return redirect(url('/myPost/'.$post->owner_id))->with('message', 'Post successfully added!');
    }

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'description' => 'required'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->description = $request->description;
        $comment->user_id = $request->user_id;
        $comment->save();
        return back();
    }

    public function deletePost($id)
    {
        Post::destroy($id);
        return redirect(url('/home'))->with('message','Post successfully deleted');
    }

    public function addToCart(Request $request, $id)
    {
        $post = Post::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if($oldCart != null){
            if (in_array($id, $oldCart->posts)) {
                return redirect(url('/detail/' . $id))->with('message', 'Post already exist in your cart');
            }
        }

        $cart = new Cart($oldCart);
        $cart->add($post, $post->id);

        $request->session()->put('cart', $cart);
        return redirect(url('/cart'))->with('message', 'Post successfully added to cart');
    }

    public function getCart()
    {

        if(Session::has('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            return view('cart', ['posts' => $cart->posts, 'totalPrice' => $cart->totalPrice]);
        }
        return view('cart', ['totalPrice' => 0]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $posts = Session::get('cart')->posts;
        if (sizeof($posts) == 1){
            Session::forget('cart');
        }
        else {
            $cart = new Cart(Session::get('cart'));
            $cart->remove($id);
            $request->session()->put('cart', $cart);
        }
        return redirect(url('/cart'))->with('message', 'Post successfully removed');
    }
}
