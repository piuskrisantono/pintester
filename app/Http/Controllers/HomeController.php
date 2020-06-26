<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\FollowedCategory;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category'])->paginate(10);
        return view('home', compact('posts'));
    }

    public function searchResult(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->with('category')->paginate(10);
        return view('home', compact('posts'));
    }

    public function detailPost($id)
    {
        $post = Post::where('id','=', $id)->with(['user','category'])->first();
        $comments = Comment::where('post_id','=', $id)->with('user')->get();

        return view('detail', compact('post','comments'));
    }

}
