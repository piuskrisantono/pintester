<?php

namespace App\Http\Controllers;
use App\FollowedCategory;
use App\Post;
use App\User;
use App\Http\Middleware\CheckLogin;
use App\Category;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'password' => 'required|alpha_num|min:8',
                'gender' => 'required',
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $user = User::find($request->userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->save();
        return back();
    }

    public function followedCategory($id)
    {
        $categories = Category::all();
        $followed = FollowedCategory::where('user_id','=',$id)->pluck('category_id')->toArray();
        return view('categories', compact('categories','followed'));
    }

    public function followUnfollow($category_id, $user_id)
    {
        $followed = FollowedCategory::where('user_id','=',$user_id)->pluck('category_id')->toArray();

        if (in_array($category_id, $followed)){
            $tes =FollowedCategory::where('user_id','=', $user_id)->where('category_id','=', $category_id)->delete();
        }
        else{
            $followCategory = new FollowedCategory();
            $followCategory->category_id = $category_id;
            $followCategory->user_id = $user_id;
            $followCategory->save();
        }
        return back();
    }
}
